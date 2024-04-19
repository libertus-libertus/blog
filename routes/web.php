<?php

use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\CategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('/home/slide', 'homeSlider')->name('home.slide');
        Route::post('/update/slider', 'updateSlider')->name('update.slider');
    });
});

Route::controller(AboutController::class)->group(function () {
    // backend
    Route::get('/about/page', 'aboutPage')->name('about.page')->middleware('auth');
    Route::post('/update/about', 'updateAbout')->name('update.about')->middleware('auth');
    Route::get('/about/multi/image', 'aboutMultiImage')->name('about.multi.image')->middleware('auth');
    Route::post('/store/multi/image', 'storeMultiImage')->name('store.multi.image')->middleware('auth');
    Route::get('/all/multi/image', 'allMultiImage')->name('all.multi.image')->middleware('auth');
    Route::get('/edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image')->middleware('auth');
    Route::post('/update/multi/image', 'updateMultiImage')->name('update.multi.image')->middleware('auth');
    Route::get('/delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image')->middleware('auth');

    // frontend
    Route::get('/home/about', 'homeAbout')->name('home.about');
});

Route::controller(PortfolioController::class)->group(function () {
    // backend
    Route::get('/portfolio/page', 'portfolioPage')->name('portfolio.page')->middleware('auth'); // showData
    Route::get('/add/portfolio/page', 'addPortfolioPage')->name('add.portfolio.page')->middleware('auth'); // formAddData
    Route::post('/store/portfolio/page', 'storePortfolioPage')->name('store.portfolio.page')->middleware('auth'); // saveData
    Route::get('/edit/portfolio/page/{id}', 'editPortfolioPage')->name('edit.portfolio.page')->middleware('auth'); // formEditData
    Route::post('/update/portfolio/page/', 'updatePortfolioPage')->name('update.portfolio.page')->middleware('auth'); // updateData
    Route::get('/delete/portfolio/page/{id}', 'deletePortfolioPage')->name('delete.portfolio.page')->middleware('auth'); // deleteData

    // frontend
    Route::get('/details/portfolio/page/{id}', 'detailsPortfolioPage')->name('details.portfolio.page'); // detailsPortfolioPage
    Route::get('/portfolio', 'portfolio')->name('portfolio'); // showData
});

Route::middleware(['auth'])->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/page', 'categoryPage')->name('category.page'); // showData
        Route::get('/add/category/page', 'addCategoryPage')->name('add.category.page'); // formAddData
        Route::post('/store/category/page', 'storeCategoryPage')->name('store.category.page'); // saveData
        Route::get('/edit/category/page/{id}', 'editCategoryPage')->name('edit.category.page'); // formEditData
        Route::post('/update/category/page', 'updateCategoryPage')->name('update.category.page'); // updateData
        Route::get('/delete/category/page/{id}', 'deleteCategoryPage')->name('delete.category.page'); // deleteData
    });
});

Route::controller(BlogController::class)->group(function () {
    // backend
    Route::get('/blog/page', 'blogPage')->name('blog.page')->middleware('auth'); // showData
    Route::get('/add/blog/page', 'addBlogPage')->name('add.blog.page')->middleware('auth'); // formAddData
    Route::post('/store/blog/page', 'storeBlogPage')->name('store.blog.page')->middleware('auth'); // saveData
    Route::get('/edit/blog/page/{id}', 'editBlogPage')->name('edit.blog.page')->middleware('auth'); // formEditData
    Route::post('/update/blog/page', 'updateBlogPage')->name('update.blog.page')->middleware('auth'); // updateData
    Route::get('/delete/blog/page/{id}', 'deleteBlogPage')->name('delete.blog.page')->middleware('auth'); // deleteData

    // frontend
    Route::get('/details/blog/page/{id}', 'detailsBlogPage')->name('details.blog.page'); // blogSinglePageArticle
    Route::get('/category/blog/page/{id}', 'categoryBlogPage')->name('category.blog.page'); // klikCategoryFilter
    Route::get('/blog', 'blog')->name('home.blog'); // blogLandingPage
});

Route::middleware(['auth'])->group(function () {
    Route::controller(FooterController::class)->group(function () {
        Route::get('/footer/page', 'footerPage')->name('footer.page'); // showData
        Route::post('/update/footer/page', 'updateFooterPage')->name('update.footer.page'); // updateData
    });
});

Route::controller(ContactController::class)->group(function () {
    // backend
    Route::post('/store/message', 'storeMessage')->name('store.message')->middleware('auth'); // saveData
    Route::get('/contact/message', 'contactMessage')->name('contact.message')->middleware('auth'); // showData
    Route::get('/delete/message/{id}', 'deleteMessage')->name('delete.message')->middleware('auth'); // showData

    // frontend
    Route::get('/contact/page', 'contactPage')->name('contact.page'); // showData
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
