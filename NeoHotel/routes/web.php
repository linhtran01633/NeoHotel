<?php

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

$room_type = [
    '0' => 'Economy No Window',
    '1' => 'Standard',
    '2' => 'Deluxe Back',
    '3' => 'Deluxe Front',
    '4' => 'Executive',
];

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

Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/activities', function () {
    return view('activities');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/booking', function () {
    return view('booking');
});


Route::get('/dashboard', function () {
    $data = ['10', '20', '30', '5'];
    $labelses = ['tháng3', 'tháng 4', 'tháng 5', 'tháng 6'];

    return view('admin.dashboard')->with(['data' => $data, 'labelses' => $labelses]);
})->name('dashboard');

Route::get('/dashboard/booking', function () {
    return view('admin.booking');
})->name('admin.booking');

Route::get('/dashboard/room', function () use($room_type) {
    return view('admin.room')->with(['room_type' => $room_type]);
})->name('admin.room');

Route::get('/dashboard/customer', function () {
    return view('admin.customer');
})->name('admin.customer');

