<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\CategoryRoomRequest;
use App\Http\Requests\ContractRequest;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\HomeSlideRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\BookingService;
use App\Models\CategoryRoom;
use App\Models\Contract;
use App\Models\Faq;
use App\Models\HomeSlide;
use App\Models\Room;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Faker\Calculator\Ean;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index() {
        return '';
    }

    public function homeSlide(Request $request) {
        if($request->ajax()) {
            $table_data = HomeSlide::select('*')->where('delete_flag', 0)->orderBy('id', 'asc')->get();

            return response()->json(@$table_data);
        }
        $page_current = 'home_slide';
        return view('admin.home_slide', compact('page_current'));
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
            $table_data = Faq::select('*')->where('delete_flag', 0)->orderBy('id', 'asc')->get();
            return response()->json(@$table_data);
        }

        $page_current = 'faq';

        return view('admin.faq', compact('page_current'));
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
        $page_current = 'about_us';

        return view('admin.about_us',compact('aboutUs', 'array_title1_images', 'array_title3_images', 'array_title4_images', 'page_current'));
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

    public function service(Request $request) {

        $array_images = [];
        $array_service = [];

        $data = Service::select('*')->where('delete_flag', 0)->orderBy('id', 'desc')->first();

        if($data) {
            $array_images = explode(',', $data->images);

            if($data->service_list != null) {
                $array_service = array_map(function($item) {
                    return json_decode($item, true);
                },$data->service_list);
            }
        }

        $page_current = 'service';

        return view('admin.service',compact('data', 'array_images', 'array_service', 'page_current'));
    }

    public function saveService(ServiceRequest $request) {
        try {
            DB::transaction(function () use($request) {
                $imagePaths = [];

                // Nếu có hình ảnh trong yêu cầu
                if ($request->hasFile('images')) {
                    // Lặp qua từng hình ảnh và lưu chúng
                    foreach ($request->file('images') as $image) {
                        $path = $image->store('images/service');
                        $imagePaths[] = $path;
                    }
                }

                $imagePaths = implode(',', $imagePaths);

                $check = Service::orderBy('id', 'desc')->first();
                if($check) {
                    $data = $request->only($check->getFillable());
                    if($imagePaths == '') unset($data['images']);
                    else $data['images'] = $imagePaths;
                    if($request->service_list == 'null')  $data['service_list'] = null ;

                    $check->fill($data)->save();

                } else {

                    $new = new Service();
                    $data = $request->only($new->getFillable());
                    $data['images'] = $imagePaths;
                    if($request->service_list == 'null')  $data['service_list'] = null ;
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
            $table_data = CategoryRoom::select('*')->where('delete_flag', 0)->get();

            return response()->json(@$table_data);
        }
        $page_current = 'category_room';

        return view('admin.category_room', compact('page_current'));
    }

    public function saveCategoryRoom(CategoryRoomRequest $request) {

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

    public function deleteCategoryRoom(Request $request) {
        try {
            DB::transaction(function () use($request) {
                CategoryRoom::where('id', $request->id)->update(['delete_flag'=> 1]);
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_false')]);

    }

    public function infomationCategory(Request $request) {
        $data = CategoryRoom::where('id', $request->id)->first();
        return response()->json(@$data);
    }


    public function contract() {
        $data = Contract::where('delete_flag', 0)->first();
        $page_current = 'contract';
        return view('admin.contract', compact('data', 'page_current'));
    }

    public function saveContract(ContractRequest $request) {
        try {
            DB::transaction(function () use($request) {
                $check = Contract::orderBy('id')->first();
                if($check) {
                    $data = $request->only($check->getFillable());
                    $check->fill($data)->save();
                } else {

                    $new = new Contract();
                    $data = $request->only($new->getFillable());
                    $new->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function room() {
        $equipmentForRent = [];
        $page_current = 'rooms';
        $availableEquipment = [];
        $data = Room::where('delete_flag', 0)->first();

        if($data) {
            $equipmentForRent = json_decode($data->equipment_for_rent, true);
            $availableEquipment = json_decode($data->available_equipment, true);
        }


        return view('admin.room',compact('page_current', 'data', 'equipmentForRent', 'availableEquipment'));
    }

    public function saveRoom(RoomRequest $request) {
        try {
            DB::transaction(function () use($request) {
                $check = Room::orderBy('id')->first();
                if($check) {
                    $data = $request->only($check->getFillable());
                    $data['equipment_for_rent'] = json_encode($request->equipment_for_rent);
                    $data['available_equipment'] = json_encode($request->available_equipment);
                    $check->fill($data)->save();
                } else {
                    $new = new Room();
                    $data = $request->only($new->getFillable());
                    $data['equipment_for_rent'] = json_encode($request->equipment_for_rent);
                    $data['available_equipment'] = json_encode($request->available_equipment);
                    $new->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function banner() {
        $array_images = [];
        $array_images_mobile = [];
        $data = Banner::where('delete_flag', 0)->first();
        if($data) {
            $array_images = [$data->images];
            $array_images_mobile = [$data->images_mobile];
        }
        return view('admin.banner', compact('data', 'array_images', 'array_images_mobile'));
    }

    public function saveBanner(BannerRequest $request){
        try {
            DB::transaction(function () use($request) {


                $imagePath = '';
                $imageMobilePath = '';

                if ($request->hasFile('images')) {
                    $path_image = $request->file('images')->store('images/banner');
                    $imagePath = $path_image;
                }

                if ($request->hasFile('images_mobile')) {
                    $path_image_mobile = $request->file('images_mobile')->store('images/banner');
                    $imageMobilePath = $path_image_mobile;
                }

                $check = Banner::orderBy('id')->first();

                if($check) {
                    $data = $request->only($check->getFillable());
                    if($imagePath == '') unset($data['images']);
                    else $data['images'] = $imagePath;

                    if($imageMobilePath == '') unset($data['images_mobile']);
                    else $data['images_mobile'] = $imageMobilePath;

                    $check->fill($data)->save();
                } else {
                    $new = new Banner();
                    $data = $request->only($new->getFillable());
                    $data['images'] = $imagePath;
                    $data['images_mobile'] = $imageMobilePath;
                    $new->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

}
