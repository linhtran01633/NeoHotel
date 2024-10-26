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

Route::get('/', [ClientController::class, 'home'])->name('home');

Route::get('/about-us', [ClientController::class, 'about_us'])->name('about_us');


Route::get('services', [ClientController::class, 'services'])->name('services');

Route::get('rooms', [ClientController::class, 'rooms'])->name('rooms');

Route::get('/activities', function () {
    return view('activities');
});

Route::get('faq', [ClientController::class, 'faq'])->name('faq');

Route::get('contact', [ClientController::class, 'contact'])->name('contact');

Route::get('booking', [ClientController::class, 'booking'])->name('booking');
Route::post('submit-booking', [ClientController::class, 'submitBooking'])->name('submit-booking');


Route::prefix('dashboard')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('home-slide', [AdminController::class, 'homeSlide'])->name('admin.home_slide');
    Route::post('infomation_home_slide', [AdminController::class, 'infomationHomeSlide'])->name('admin.infomation_home_slide');
    Route::post('save_home_slide', [AdminController::class, 'saveHomeSlide'])->name('admin.home_slide.save');
    Route::post('delete_home_slide', [AdminController::class, 'deleteHomeSlide'])->name('admin.delete.home_slide');

    Route::get('about_us', [AdminController::class, 'aboutUs'])->name('admin.about_us');
    Route::post('save_about_us', [AdminController::class, 'saveAboutUs'])->name('admin.about_us.save');

    Route::get('service', [AdminController::class, 'service'])->name('admin.service');
    Route::post('save_service', [AdminController::class, 'saveService'])->name('admin.service.save');

    Route::get('faq', [AdminController::class, 'faq'])->name('admin.faq');
    Route::post('infomation_faq', [AdminController::class, 'infomationFaq'])->name('admin.infomation_faq');
    Route::post('save_faq', [AdminController::class, 'saveFaq'])->name('admin.faq.save');
    Route::post('delete_faq', [AdminController::class, 'deleteFaq'])->name('admin.delete.faq');

    Route::get('contact', [AdminController::class, 'contract'])->name('admin.contract');
    Route::post('save_contract', [AdminController::class, 'saveContract'])->name('admin.contract.save');


    Route::get('category-room', [AdminController::class, 'categoryRoom'])->name('admin.category_room');
    Route::post('infomation-category', [AdminController::class, 'infomationCategory'])->name('admin.infomation_category');
    Route::post('save_category_room', [AdminController::class, 'saveCategoryRoom'])->name('admin.category_room.save');

    Route::get('room', [AdminController::class, 'room'])->name('admin.room');
    Route::post('save_room', [AdminController::class, 'saveRoom'])->name('admin.room.save');

    Route::get('banner', [AdminController::class, 'banner'])->name('admin.banner');
    Route::post('save_banner', [AdminController::class, 'saveBanner'])->name('admin.banner.save');
});


Route::get('/dashboard/customer', function () {
    return view('admin.customer');
})->name('admin.customer');

