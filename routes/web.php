<?php

use App\Http\Controllers\Home\HomeSliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(DemoController::class)->group(function() {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'Contact')->name('contact.page');
});

// Admin all routes
Route::controller(AdminController::class)->group(function() {
    // crudUser
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');

    // changePassword
    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

// landingPage -> frontend
Route::controller(HomeSliderController::class)->group(function() {
    Route::get('/home/slide', 'homeSlider')->name('home.slide');
    Route::post('/update/slider', 'updateSlider')->name('update.slider');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
