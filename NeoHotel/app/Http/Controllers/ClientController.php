<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Booking;
use App\Models\CategoryRoom;
use App\Models\Contract;
use App\Models\Faq;
use App\Models\HomeSlide;
use App\Models\Room;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{

    public function home() {
        $homeSlide = HomeSlide::where('delete_flag', 0)->orderBy('id')->get();
        return view('welcome', compact('homeSlide'));
    }

    public function faq() {
        $faq =  Faq::where('delete_flag', 0)->orderBy('id')->get();
        return view('faq', compact('faq'));
    }

    public function about_us() {
        $aboutUs = AboutUs::select('*')->where('delete_flag', 0)->orderBy('id', 'asc')->first();
        return view('about_us', compact('aboutUs'));
    }

    public function services() {
        $array_images = [];
        $array_service = [];

        $data = Service::select('*')->where('delete_flag', 0)->orderBy('id', 'asc')->first();

        if($data) {
            $array_images = explode(',', $data->images);
            $array_service = array_map(function($item) {
                return json_decode($item, true);
            }, $data->service_list);
        }
        return view('services',compact('data', 'array_images', 'array_service'));
    }

    public function contact() {
        $data = Contract::where('delete_flag', 0)->first();
        return view('contact', compact('data'));
    }

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
                // $new_booking = new Booking();
                // $data = $request->only($new_booking->getFillable());
                // if(!$request->breakfast) $data['breakfast'] = 0;
                // $new_booking->fill($data)->save();
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  __('booking_false'));
        }
        return redirect()->back()->with('message',   __('booking_success'));
    }

    public function rooms(Request $request)
    {
        $rooms = Room::where('delete_flag', 0)->first();
        $categoryRooms = CategoryRoom::where('delete_flag', 0)->orderBy('id')->get();

        $equipmentForRent = [];
        $availableEquipment = [];
        $data = Room::where('delete_flag', 0)->first();

        if($data) {
            $equipmentForRent = json_decode($data->equipment_for_rent, true);
            $availableEquipment = json_decode($data->available_equipment, true);
        }

        return view('rooms', compact('categoryRooms', 'rooms', 'equipmentForRent', 'availableEquipment'));

    }

}
