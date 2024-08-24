<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRoomRequest;
use App\Http\Requests\RoomRequest;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\BookingService;
use App\Models\CategoryRoom;
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
    public function room()
    {
        $room_type = [
            '0' => 'Economy No Window',
            '1' => 'Standard',
            '2' => 'Deluxe Back',
            '3' => 'Deluxe Front',
            '4' => 'Executive',
        ];

        $listRooms = Room::get();

        return view('admin.room')->with(['room_type' => $room_type, 'listRooms' => $listRooms]);
    }

    public function saveRoom(RoomRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $new_room = new Room();
                $data = $request->only($new_room->getFillable());
                $new_room->fill($data)->save();
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false, 'message' => __('save_false')]);
        }

        return response()->json(['success' => true, 'message' => __('save_success')]);
    }

    public function booking(Request $request)
    {
        $room_type = [
            '0' => 'Economy No Window',
            '1' => 'Standard',
            '2' => 'Deluxe Back',
            '3' => 'Deluxe Front',
            '4' => 'Executive',
        ];
        $service = Service::all();

        if($request->ajax()) {
            $table_data = Booking::with('bookingRoom', 'bookingRoom.room')
            ->select(
                'id',
                'room_type as type',
                'start_date',
                'end_date',
                'status',
                'number_of_rooms',
                DB::raw("CONCAT(c_first_name ,' ', c_last_name) as c_name")
            );
            $table_data->orderBy('status', 'asc');

            return DataTables::of($table_data)
            ->addColumn('room_type', function($row) use($room_type) {
                return $room_type[$row->type];
            })
            ->addColumn('room_names', function($row) use($room_type) {
                $room = '';
                foreach ($row->bookingRoom as $index=>$item) {
                    if($item->room) {
                        if($index == 0) {
                            $room = $room . $item->room->room_code;
                        } else {
                            $room = $room . ', ' . $item->room->room_code;
                        }
                    }
                }
                return $room;
            })

            ->make(true);
        }

        return view('admin.booking')->with(['room_type' => $room_type, 'service' => $service]);
    }

    public function saveBooking(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                if($request->id) {
                    $new_booking = Booking::find($request->id);
                    $data = $request->only($new_booking->getFillable());
                    $new_booking->fill($data)->save();
                } else {
                    $new_booking = new Booking();
                    $data = $request->only($new_booking->getFillable());
                    $new_booking->fill($data)->save();
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  'save false');
        }
        return redirect()->back()->with('message',  'save success');
    }


    public function deleteBooking($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $booking = Booking::where('id', $id)->first();
                if($booking) {
                    $booking->status = 1;
                    $booking->save();
                } else {
                    throw new Exception('booking is not found');
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  'delete false');
        }
        return redirect()->back()->with('message',  'delete success');
    }


    public function searchBooking(Request $request)
    {
        $booking = Booking::where('id', $request->id)->first();
        return response()->json($booking);
    }

    public function searchRoom(Request $request)
    {
        $array_room = BookingRoom::with(['booking'])->where('status', 0)
        ->whereHas('booking', function($q) use($request){
            $q->where(function($q) use($request) {
                $q->whereDate('start_date', '>=' , $request->start_date);
                $q->whereDate('end_date', '>=' , $request->start_date);
            });

            $q->orWhere(function($q) use($request) {
                $q->whereDate('start_date', '>=' , $request->end_date);
                $q->whereDate('end_date', '>=' , $request->end_date);
            });
        })
        ->get()->pluck('room_id')->toArray();

        $listRooms = Room::orderBy('room_code')
        ->whereNotIn('id', $array_room)
        ->get()->toArray();

        return response()->json($listRooms);
    }

    public function bookingRoom(Request $request)
    {
        try{
            DB::transaction(function() use ($request){
                if($request->room_id) {
                    foreach($request->room_id as $room) {

                        $rooms = Room::where('id', $room)->first();
                        $bookings = Booking::where('id', $request->id)->first();
                        $startDate = Carbon::parse($bookings->start_date);
                        $endDate = Carbon::parse($bookings->end_date);
                        $number_of_day = $startDate->diffInDays($endDate);

                        $new_booking_room = new BookingRoom();
                        $new_booking_room->room_id = $room;
                        $new_booking_room->booking_id = $request->id;
                        $new_booking_room->room_amount = $rooms->price;
                        $new_booking_room->number_of_day = $number_of_day;
                        $new_booking_room->save();
                    }

                    Booking::where('id', $request->id)->update(['status' => 2]);
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json($e->getMessage());
        }
        return response()->json('success');
    }

    public function booking_room(Request $request)
    {
        $room_id = [];
        $listRooms = [];
        $room_type = [
            '0' => 'Economy No Window',
            '1' => 'Standard',
            '2' => 'Deluxe Back',
            '3' => 'Deluxe Front',
            '4' => 'Executive',
        ];

        $service = Service::all();


        $end_date = Carbon::now()->format('Y-m-d');
        $start_date = Carbon::now()->format('Y-m-d');
        if($request->end_date) $end_date = $request->end_date;
        if($request->start_date) $start_date = $request->start_date;

        $listBokking = BookingRoom::with(['room', 'booking'])->where('status', 0)
        ->whereHas('booking', function($q) use($end_date, $start_date){
            $q->where(function($query) use ($end_date, $start_date) {
                $query->where('start_date', '<=', $end_date)
                      ->where('end_date', '>=', $start_date);
            });
        })
        ->get();


        foreach ($listBokking as $item) {
            $room_id[] = $item->room_id;
            $listRooms[] = [
                'status' => 1,
                'booking_id' => $item->booking->id,
                'room_code' => $item->room->room_code,
                'room_name' => $item->room->room_name,
                'room_type' => $item->room->room_type,
                'end_date' => Carbon::parse($item->booking->end_date)->format('d/m/Y'),
                'start_date' => Carbon::parse($item->booking->start_date)->format('d/m/Y'),
                'customer' => $item->booking->c_first_name . ' ' . $item->booking->c_last_name,
            ];
        }

        $rooms = Room::whereNotIn('id', $room_id)->get();

        foreach ($rooms as $room) {
            $listRooms[] = [
                'status' => 0,
                'booking_id' => 0,
                'room_code' => $room->room_code,
                'room_name' => $room->room_name,
                'room_type' => $room->room_type,
                'end_date' => '',
                'start_date' => '',
                'customer' => '',
            ];
        }

        $withData = [
            'service' => $service,
            'end_date' => $end_date,
            'room_type' => $room_type,
            'listRooms' => $listRooms,
            'start_date' => $start_date,
        ];

        return view('admin.booking_room')->with($withData);
    }



    public function service(Request $request)
    {
        if($request->ajax()) {
            $table_data = Service::select(
                'id',
                'price',
                'service_name',
            );
            $table_data->orderBy('id', 'asc');

            return DataTables::of($table_data)
            ->make(true);
        }
        $service = Service::all();
        return view('admin.service')->with(['service' => $service]);
    }

    public function saveService(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $new_service = new Service();
                $data = $request->only($new_service->getFillable());
                $new_service->fill($data)->save();
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  'save false');
        }
        return redirect()->back()->with('message',  'save success');
    }

    public function saveBookingService(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                BookingRoom::where('booking_id', $request->id)->where('status', 0)->update([
                    'amount' => $request->amount,
                    'room_amount' => $request->room_amount,
                    'number_of_day' => $request->number_of_day
                ]);

                BookingService::where('booking_id', $request->id)->where('status', 0)->update(['status' => 1]);
                foreach ($request->data['service_id'] as $index=>$item) {
                    if (isset($item) && isset($request->data['sl'][$index]) && isset($request->data['price'][$index]) && isset($request->data['money'][$index])) {
                        $newData = new BookingService();
                        $newData->status = 0;
                        $newData->service_id = $item;
                        $newData->booking_id = $request->id;
                        $newData->sl = $request->data['sl'][$index];
                        $newData->price = $request->data['price'][$index];
                        $newData->money = $request->data['money'][$index];
                        $newData->save();
                    }
                }
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  'save false');
        }
        return redirect()->back()->with('message',  'save success');
    }

    public function getBookingService(Request $request) {
        $service = BookingService::where('booking_id', $request->booking_id)->where('status', 0)->get();
        $infomation = BookingRoom::select(
            'booking_room.id',
            'booking_room.room_id',
            'booking_room.booking_id',
            'booking_room.number_of_day',
            'booking_room.room_amount',
            'booking_room.amount',
            'bookings.start_date',
            'bookings.end_date',
            'rooms.room_name',
        )
        ->join('bookings', 'bookings.id', 'booking_room.booking_id')
        ->join('rooms', 'rooms.id', 'booking_room.room_id')
        ->where('booking_id', $request->booking_id)->first();

        Log::info($infomation);
        return response()->json(['service' => $service, 'infomation' => $infomation]);
    }

    public function checkOutBookingRoom(Request $request) {
        $data = BookingRoom::where('booking_id', $request->booking_id)->where('status', 0)->update(['status' => 1]);
        return response()->json($data);
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
        Log::info($request->all());

        $data = CategoryRoom::where('id', $request->id)->first();
        return response()->json(@$data);
    }

}
