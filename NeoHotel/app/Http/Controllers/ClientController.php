<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CategoryRoom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    //
    public function booking(Request $request)
    {
        $step = $request->step;
        return view('booking')->with([
            'step' => $step,
        ]);
    }

    public function submitBooking(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $new_booking = new Booking();
                $data = $request->only($new_booking->getFillable());
                if(!$request->breakfast) $data['breakfast'] = 0;
                $new_booking->fill($data)->save();
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  __('booking_false'));
        }
        return redirect()->back()->with('message',   __('booking_success'));
    }

    public function rooms(Request $request)
    {
        $categoryRooms = CategoryRoom::orderBy('id')->get();
        return view('rooms', compact('categoryRooms'));

    }




}
