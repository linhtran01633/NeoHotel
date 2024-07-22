<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\Room;
use App\Models\Service;
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

    public function saveRoom(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $new_room = new Room();
                $data = $request->only($new_room->getFillable());
                $new_room->fill($data)->save();
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  'save false');
        }
        return redirect()->back()->with('message',  'save success');
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

        if($request->ajax()) {
            $table_data = Booking::select(
                'id',
                'room_type as type',
                'start_date',
                'end_date',
                'number_of_rooms',
                'status',
                DB::raw("CONCAT(c_first_name ,' ', c_last_name) as c_name")
            );
            $table_data->orderBy('status', 'asc');

            return DataTables::of($table_data)
            ->addColumn('room_type', function($row) use($room_type) {
                return $room_type[$row->type];
            })
            ->make(true);
        }

        return view('admin.booking')->with(['room_type' => $room_type]);
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
                        $new_booking_room = new BookingRoom();
                        $new_booking_room->room_id = $room;
                        $new_booking_room->booking_id = $request->id;
                        $new_booking_room->save();
                    }

                    Booking::where('id', $request->id)->update(['status' => 2]);
                }
            });
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
        return response()->json('success');
    }

    public function booking_room(Request $request)
    {
        $room_type = [
            '0' => 'Economy No Window',
            '1' => 'Standard',
            '2' => 'Deluxe Back',
            '3' => 'Deluxe Front',
            '4' => 'Executive',
        ];

        $listRooms = BookingRoom::with(['room', 'booking'])->where('status', 0)->get();
        $service = Service::all();

        return view('admin.booking_room')->with(['room_type' => $room_type, 'listRooms' => $listRooms, 'service' => $service]);
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
        return 1;
    }
}
