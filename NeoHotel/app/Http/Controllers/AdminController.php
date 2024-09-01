<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\CategoryRoomRequest;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\HomeSlideRequest;
use App\Http\Requests\RoomRequest;
use App\Models\AboutUs;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\BookingService;
use App\Models\CategoryRoom;
use App\Models\Faq;
use App\Models\HomeSlide;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Faker\Calculator\Ean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    //
    public function index(Request $request) {
        $labelses_chart = [];
        for ($i = 0; $i < 6; $i++) {
            $date = Carbon::now()->subMonths($i);
            $labelses_chart[] = $date->format('Y-m');
        }

        $labelses_chart = array_reverse($labelses_chart);


        // tổng số booking trong 6 tháng gần nhất
        $total_booking = Booking::whereDate('created_at', '>=', Carbon::now()->subMonths(5))->get();
        $chart1_temp = [];
        foreach($total_booking as $booking) {
            $chart1_temp[] = Carbon::parse($booking->created_at)->format('Y-m');
        }

        $chart1 = array_count_values($chart1_temp);

        // Duyệt qua mảng các tháng cần kiểm tra
        foreach ($labelses_chart as $month) {
            if (!isset($chart1[$month])) $chart1[$month] = 0;
        }

        ksort($chart1);
        $chart1 = array_values($chart1);


        // tổng số booking bị huỷ trong 6 tháng gần nhất
        $total_booking_cancel = Booking::where('status', 1)->whereDate('created_at', '>=', Carbon::now()->subMonths(5))->get();
        $chart2_temp = [];
        foreach($total_booking_cancel as $booking) {
            $chart2_temp[] = Carbon::parse($booking->created_at)->format('Y-m');
        }

        $chart2 = array_count_values($chart2_temp);

        // Duyệt qua mảng các tháng cần kiểm tra
        foreach ($labelses_chart as $month) {
            if (!isset($chart2[$month])) $chart2[$month] = 0;
        }

        ksort($chart2);
        $chart2 = array_values($chart2);

        // tổng số booking đã sử lý trong 6 tháng gần nhất
        $total_booking_processed = Booking::where('status', 2)->whereDate('created_at', '>=', Carbon::now()->subMonths(5))->get();
        $chart3_temp = [];
        foreach($total_booking_processed as $booking) {
            $chart3_temp[] = Carbon::parse($booking->created_at)->format('Y-m');
        }

        $chart3 = array_count_values($chart3_temp);

        // Duyệt qua mảng các tháng cần kiểm tra
        foreach ($labelses_chart as $month) {
            if (!isset($chart3[$month])) $chart3[$month] = 0;
        }

        ksort($chart3);
        $chart3 = array_values($chart3);


        // tổng số booking chưa sử lý trong 6 tháng gần nhất
        $total_booking_unprocessed = Booking::where('status', 0)->whereDate('created_at', '>=', Carbon::now()->subMonths(5))->get();
        $chart4_temp = [];
        foreach($total_booking_unprocessed as $booking) {
            $chart4_temp[] = Carbon::parse($booking->created_at)->format('Y-m');
        }

        $chart4 = array_count_values($chart4_temp);

        // Duyệt qua mảng các tháng cần kiểm tra
        foreach ($labelses_chart as $month) {
            if (!isset($chart4[$month])) $chart4[$month] = 0;
        }

        ksort($chart4);
        $chart4 = array_values($chart4);

        $widthData = [
            'chart1' => $chart1,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
            'labelses_chart' => $labelses_chart,
        ];

        return view('admin.dashboard')->with($widthData);
    }

    public function homeSlide(Request $request) {
        if($request->ajax()) {
            $table_data = HomeSlide::select('*')->where('delete_flag', 0)->orderBy('id', 'asc');

            return DataTables::of($table_data)
            ->make(true);
        }
        return view('admin.home_slide');
    }

    public function saveHomeSlide(HomeSlideRequest $request) {

        try {
            DB::transaction(function () use($request) {
                $imagePaths = '';
                $imagePathMobile = '';
                // Nếu có hình ảnh trong yêu cầu
                if ($request->hasFile('images')) {
                    $path = $request->file('images')->store('images/home_slides');
                    $imagePaths = $path;
                }

                if ($request->hasFile('images_mobile')) {
                    $path_mobile = $request->file('images_mobile')->store('images/home_slides');
                    $imagePathMobile = $path_mobile;
                }

                if($request->id) {
                    $check_home_slide = HomeSlide::where('id', $request->id)->first();
                    if($check_home_slide && Carbon::parse($check_home_slide->updated_at)->format('Y-m-d H:i:s')  == Carbon::parse($request->updated_at)->format('Y-m-d H:i:s')) {
                        $data = $request->only($check_home_slide->getFillable());

                        if($imagePaths == '') unset($data['images']);
                        else $data['images'] = $imagePaths;

                        if($imagePathMobile == '') unset($data['images_mobile']);
                        else $data['images_mobile'] = $imagePathMobile;

                        $check_home_slide->fill($data)->save();
                    } else {
                        throw new Exception( __('save_false'));
                    }
                } else {

                    $new_home_slide = new HomeSlide();
                    $data = $request->only($new_home_slide->getFillable());
                    $data['images'] = $imagePaths;
                    $data['images_mobile'] = $imagePathMobile;
                    $new_home_slide->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function deleteHomeSlide(Request $request) {
        try {
            DB::transaction(function () use($request) {
                HomeSlide::where('id', $request->id)->update(['delete_flag' => 1]);
            });
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function infomationHomeSlide(Request $request) {
        $data = HomeSlide::where('id', $request->id)->first();
        return response()->json(@$data);
    }

    public function faq(Request $request) {
        if($request->ajax()) {
            $table_data = Faq::select('*')->where('delete_flag', 0)->orderBy('id', 'asc');

            return DataTables::of($table_data)
            ->make(true);
        }
        return view('admin.faq');
    }

    public function saveFaq(FaqRequest $request) {

        try {
            DB::transaction(function () use($request) {

                if($request->id) {
                    $check = Faq::where('id', $request->id)->first();
                    if($check && Carbon::parse($check->updated_at)->format('Y-m-d H:i:s')  == Carbon::parse($request->updated_at)->format('Y-m-d H:i:s')) {
                        $data = $request->only($check->getFillable());
                        $check->fill($data)->save();
                    } else {
                        throw new Exception( __('save_false'));
                    }
                } else {

                    $new_home_slide = new Faq();
                    $data = $request->only($new_home_slide->getFillable());
                    $new_home_slide->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function deleteFaq(Request $request) {
        try {
            DB::transaction(function () use($request) {
                Faq::where('id', $request->id)->update(['delete_flag' => 1]);
            });
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function infomationFaq(Request $request) {
        $data = Faq::where('id', $request->id)->first();
        return response()->json(@$data);
    }


    public function aboutUs(Request $request) {
        $array_title1_images = [];
        $array_title3_images = [];
        $array_title4_images = [];

        $aboutUs = AboutUs::select('*')->where('delete_flag', 0)->orderBy('id', 'asc')->first();

        if($aboutUs) {
            $array_title1_images[] = $aboutUs->title1_images;
            $array_title3_images[] = $aboutUs->title3_images;
            $array_title4_images[] = $aboutUs->title4_images;
        }
        return view('admin.about_us',compact('aboutUs', 'array_title1_images', 'array_title3_images', 'array_title4_images'));
    }

    public function saveAboutUs(AboutUsRequest $request) {

        try {
            DB::transaction(function () use($request) {
                $imagePathTitle1 = '';
                $imagePathTitle3 = '';
                $imagePathTitle4 = '';

                if ($request->hasFile('title1_images')) {
                    $path_image1 = $request->file('title1_images')->store('images/about_us');
                    $imagePathTitle1 = $path_image1;
                }

                if ($request->hasFile('title3_images')) {
                    $path_image3 = $request->file('title3_images')->store('images/about_us');
                    $imagePathTitle3 = $path_image3;
                }

                if ($request->hasFile('title4_images')) {
                    $path_image4 = $request->file('title4_images')->store('images/about_us');
                    $imagePathTitle4 = $path_image4;
                }

                if($request->id) {
                    $check = AboutUs::where('id', $request->id)->first();
                    if($check && Carbon::parse($check->updated_at)->format('Y-m-d H:i:s')  == Carbon::parse($request->updated_at)->format('Y-m-d H:i:s')) {
                        $data = $request->only($check->getFillable());

                        if($imagePathTitle1 == '') unset($data['title1_images']);
                        else $data['title1_images'] = $imagePathTitle1;

                        if($imagePathTitle3 == '') unset($data['title3_images']);
                        else $data['title3_images'] = $imagePathTitle3;

                        if($imagePathTitle4 == '') unset($data['title4_images']);
                        else $data['title4_images'] = $imagePathTitle4;

                        $check->fill($data)->save();
                    } else {
                        throw new Exception( __('save_false'));
                    }
                } else {

                    $new = new AboutUs();
                    $data = $request->only($new->getFillable());
                    $data['title1_images'] = $imagePathTitle1;
                    $data['title3_images'] = $imagePathTitle3;
                    $data['title4_images'] = $imagePathTitle4;
                    $new->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }


    public function categoryRoom(Request $request) {

        if($request->ajax()) {
            $table_data = CategoryRoom::select('*');
            // $table_data->orderBy('status', 'asc');

            return DataTables::of($table_data)
            ->make(true);
        }

        return view('admin.category_room');
    }

    public function saveCategoryRoom(CategoryRoomRequest $request) {

        Log::info($request->all());
        try {
            DB::transaction(function () use($request) {

                $imagePaths = [];

                // Nếu có hình ảnh trong yêu cầu
                if ($request->hasFile('images')) {
                    // Lặp qua từng hình ảnh và lưu chúng
                    foreach ($request->file('images') as $image) {
                        $path = $image->store('images/rooms');
                        $imagePaths[] = $path;
                    }
                }

                $imagePaths = implode(',', $imagePaths);

                if($request->id) {
                    $check_category = CategoryRoom::where('id', $request->id)->first();
                    if($check_category && Carbon::parse($check_category->updated_at)->format('Y-m-d H:i:s')  == Carbon::parse($request->updated_at)->format('Y-m-d H:i:s')) {
                        $data = $request->only($check_category->getFillable());

                        if($imagePaths == '') unset($data['images']);
                        else $data['images'] = $imagePaths;
                        $check_category->fill($data)->save();
                    } else {
                        throw new Exception( __('save_false'));
                    }
                } else {

                    $new_category = new CategoryRoom();
                    $data = $request->only($new_category->getFillable());
                    $data['images'] = $imagePaths;
                    $new_category->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function infomationCategory(Request $request) {
        $data = CategoryRoom::where('id', $request->id)->first();
        return response()->json(@$data);
    }

}
