<?php

use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.index');
});

// backendUsers
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('store.profile');
    Route::get('/change/password', 'changePassword')->name('change.password');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

// landingPage -> heroSection
Route::controller(HomeSliderController::class)->group(function() {
    Route::get('/home/slide', 'homeSlider')->name('home.slide');
    Route::post('/update/slider', 'updateSlider')->name('update.slider');
});

// frontend & backend -> aboutSection
Route::controller(AboutController::class)->group(function() {
    Route::get('/about/page', 'aboutPage')->name('about.page');
    Route::post('/update/about', 'updateAbout')->name('update.about');
    Route::get('/home/about', 'homeAbout')->name('home.about');
    Route::get('/about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image', 'storeMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'allMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'updateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
});

// frontend & backend -> portfolioSection
Route::controller(PortfolioController::class)->group(function() {
    Route::get('/portfolio/page', 'portfolioPage')->name('portfolio.page'); // showData
    Route::get('/add/portfolio/page', 'addPortfolioPage')->name('add.portfolio.page'); // formAddData
    Route::post('/store/portfolio/page', 'storePortfolioPage')->name('store.portfolio.page'); // saveData
    Route::get('/edit/portfolio/page/{id}', 'editPortfolioPage')->name('edit.portfolio.page'); // formEditData
    Route::post('/update/portfolio/page/', 'updatePortfolioPage')->name('update.portfolio.page'); // updateData
    Route::get('/delete/portfolio/page/{id}', 'deletePortfolioPage')->name('delete.portfolio.page'); // deleteData
    Route::get('/details/portfolio/page/{id}', 'detailsPortfolioPage')->name('details.portfolio.page'); // detailsPortfolioPage
});

Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/blog/category/page', 'blogCategoryPage')->name('blog.category.page'); // showData
    Route::get('/add/blog/category/page', 'addBlogCategoryPage')->name('add.blog.category.page'); // formAddData
    Route::post('/store/blog/category/page', 'storeBlogCategoryPage')->name('store.blog.category.page'); // saveData
    Route::get('/edit/blog/category/page/{id}', 'editBlogCategoryPage')->name('edit.blog.category.page'); // formEditData
    Route::post('/update/blog/category/page', 'updateBlogCategoryPage')->name('update.blog.category.page'); // updateData
    Route::get('/delete/blog/category/page/{id}', 'deleteBlogCategoryPage')->name('delete.blog.category.page'); // deleteData
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
