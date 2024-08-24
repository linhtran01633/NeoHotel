<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ja', 'vn'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about_us');
});


Route::get('/services', function () {
    return view('services');
});

Route::get('rooms', [ClientController::class, 'rooms'])->name('rooms');

Route::get('/activities', function () {
    return view('activities');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('booking', [ClientController::class, 'booking'])->name('booking');
Route::post('submit-booking', [ClientController::class, 'submitBooking'])->name('submit-booking');


Route::prefix('dashboard')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('room', [AdminController::class, 'room'])->name('admin.room');
    Route::post('room/save', [AdminController::class, 'saveRoom'])->name('admin.room.save');
    Route::post('search/room', [AdminController::class, 'searchRoom'])->name('admin.room.search');

    Route::get('booking', [AdminController::class, 'booking'])->name('admin.booking');
    Route::post('booking/save', [AdminController::class, 'saveBooking'])->name('admin.booking.save');
    Route::get('booking/delete/{id}', [AdminController::class, 'deleteBooking'])->name('admin.booking.delete');
    Route::post('search/booking', [AdminController::class, 'searchBooking'])->name('admin.booking.search');

    Route::get('booking_room', [AdminController::class, 'booking_room'])->name('admin.booking_room');
    Route::post('bookingRoom', [AdminController::class, 'bookingRoom'])->name('admin.bookingRoom');
    Route::post('checkOutBookingRoom', [AdminController::class, 'checkOutBookingRoom'])->name('admin.checkOutBookingRoom');


    Route::get('service', [AdminController::class, 'service'])->name('admin.service');
    Route::post('service/save', [AdminController::class, 'saveService'])->name('admin.service.save');
    Route::post('service/booking_service', [AdminController::class, 'saveBookingService'])->name('admin.booking_service.save');
    Route::post('service/get_booking_service', [AdminController::class, 'getBookingService'])->name('admin.booking_service.get');


    Route::get('category_room', [AdminController::class, 'categoryRoom'])->name('admin.category_room');
    Route::post('infomation-category', [AdminController::class, 'infomationCategory'])->name('admin.infomation_category');
    Route::post('save_category_room', [AdminController::class, 'saveCategoryRoom'])->name('admin.category_room.save');
});


Route::get('/dashboard/customer', function () {
    return view('admin.customer');
})->name('admin.customer');

