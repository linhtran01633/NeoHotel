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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

            if($data->service_list != null) {
                $array_service = array_map(function($item) {
                    return json_decode($item, true);
                },$data->service_list);
            }
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
        $categorys = CategoryRoom::where('delete_flag', 0)->orderBy('id')->get();
        $room_type = CategoryRoom::where('delete_flag', 0)->where('id', $request->room_type)->first();
        return view('booking')->with([
            'step' => $step,
            'room_type' => $room_type,
            'categorys' => $categorys
        ]);
    }

    public function submitBooking(Request $request)
    {
        if (!empty($request->honeypot)) {
            return redirect()->back()->with('message', __('spam_mail'));
        }

        $ip = $request->ip();
        $attempts = Cache::get("booking-attempts-{$ip}", 0) + 1;

        if ($attempts > 3) {
            return redirect()->back()->with('message', __('spam_mail'));
        }

        Cache::put("booking-attempts-{$ip}", $attempts, 600); // Reset sau 60 giây

        try {
            DB::transaction(function () use ($request) {
                $roomType = '';
                $room_type = CategoryRoom::where('delete_flag', 0)->where('id', $request->room_type)->first();

                if($room_type) {
                    $roomType = $room_type->name_en;
                }

                $bookingId = Config::get('bookingId.current', 61);

                $details = [
                    'roomType' => $roomType,
                    'bookingId' => $bookingId,
                    'adults'=> $request->adult,
                    'email' => $request->c_email,
                    'phone' => $request->c_phone,
                    'children'=> $request->children,
                    'request'=> $request->c_request,
                    'hotelName'=> $request->hotelName,
                    'numberOfRoom'=> $request->number_of_room,
                    'name' => $request->c_first_name . ' ' . $request->c_last_name,
                    'checkout'=> Carbon::parse($request->end_date)->format('F jS Y, h:i:s a'),
                    'checkin' => Carbon::parse($request->start_date)->format('F jS Y, h:i:s a'),
                ];

                Mail::send('mail.merchant', ['details' => $details], function ($message) use ($details) {
                    $message->to([env('EMAIL_MERCHANT_1'), env('EMAIL_MERCHANT_2')]) // Địa chỉ "to"
                            ->cc(env('EMAIL_MERCHANT_2')) // Địa chỉ "cc"
                            ->bcc([env('EMAIL_MERCHANT_3')]) // Các địa chỉ "bcc"
                            ->from('noreply.smtp.server1912@gmail.com') // Địa chỉ "from"
                            ->replyTo('noreply.smtp.server1912@gmail.com') // Địa chỉ "replyTo"
                            ->subject('Hotel Booking Info - ' . $details['name'] . ' - Booking ID [' . $details['bookingId'] . ']'); // Tiêu đề email
                });


                Mail::send('mail.guest', ['details' => $details], function ($message) use ($details) {
                    $message->to($details['email']) // Địa chỉ "to"
                            ->from('noreply.smtp.server1912@gmail.com') // Địa chỉ "from"
                            ->replyTo('noreply.smtp.server1912@gmail.com') // Địa chỉ "replyTo"
                            ->subject('Hotel Booking Info'); // Tiêu đề email
                });


                // Xử lý logic tăng bookingId
                $newBookingId = $bookingId + 1;

                // Cập nhật giá trị mới vào file cấu hình
                $this->updateBookingIdConfig($newBookingId);
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  __('booking_false'));
        }
        return redirect()->back()->with('message',   __('booking_success'));
    }

    protected function updateBookingIdConfig($newBookingId)
    {
        // Đường dẫn tới file cấu hình bookingId.php
        $filePath = config_path('bookingId.php');

        // Nội dung mới của file cấu hình
        $content = "<?php\n\nreturn [\n    'current' => {$newBookingId},\n];";

        // Ghi nội dung mới vào file
        File::put($filePath, $content);
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

    public function submitContact(Request $request)
    {

        if (!empty($request->honeypot)) {
            return redirect()->back()->with('message', __('spam_mail'));
        }

        $ip = $request->ip();
        $attempts = Cache::get("contact-attempts-{$ip}", 0) + 1;

        if ($attempts > 3) {
            return redirect()->back()->with('message', __('spam_mail'));
        }

        Cache::put("contact-attempts-{$ip}", $attempts, 600); // Reset sau 60 giây

        try {
            DB::transaction(function () use ($request) {
                $bookingId = Config::get('bookingId.current', 61);

                $details = [
                    'sex'=> $request->sex,
                    'name'=> $request->name,
                    'bookingId' => $bookingId,
                    'phone'=> $request->phone,
                    'email'=> $request->email,
                    'inquiry'=> $request->inquiry,
                    'hotelName' => 'LANTERN HOTEL',
                ];

                Mail::send('mail.contact', ['details' => $details], function ($message) use ($details) {
                    $message->to([env('EMAIL_MERCHANT_1'), env('EMAIL_MERCHANT_2')]) // Địa chỉ "to"
                            ->cc(env('EMAIL_MERCHANT_2')) // Địa chỉ "cc"
                            ->bcc([env('EMAIL_MERCHANT_3')]) // Các địa chỉ "bcc"
                            ->from('noreply.smtp.server1912@gmail.com') // Địa chỉ "from"
                            ->replyTo('noreply.smtp.server1912@gmail.com') // Địa chỉ "replyTo"
                            ->subject('Contact Info'); // Tiêu đề email
                });
            });
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->with('message',  __('contact_false'));
        }
        return redirect()->back()->with('message',   __('contact_success'));
    }
}
