<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function () {
    Route::controller(FrontendController::class)->group(function () {
        Route::get('', 'index')->name('home');
    });
});

Route::prefix('/admin/')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    // Category Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index')->name('category.index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');
        Route::get('category/edit/{id}', 'edit');
        Route::put('category/{id}', 'update');
        Route::delete('category/delete/{id}', 'destroy');
    });

    // Brand Route
    Route::controller(BrandController::class)->group(function () {
        Route::get('brand', 'index')->name('brand.index');
        Route::get('brand/create', 'create');
        Route::post('brand', 'store');
        Route::get('brand/edit/{id}', 'edit');
        Route::put('brand/{id}', 'update');
        Route::delete('brand/delete/{id}', 'destroy');
    });

    // Slider Route
    Route::controller(SliderController::class)->group(function () {
        Route::get('slider', 'index')->name('slider.index');
        Route::get('slider/create', 'create');
        Route::post('slider', 'store');
        Route::get('slider/edit/{id}', 'edit');
        Route::put('slider/{id}', 'update');
        Route::delete('slider/delete/{id}', 'destroy');
    });

    // Coupon Route
    Route::controller(CouponController::class)->group(function () {
        Route::get('coupon', 'index')->name('coupon.index');
        Route::get('coupon/create', 'create');
        Route::post('coupon', 'store');
        Route::get('coupon/edit/{id}', 'edit');
        Route::put('coupon/{id}', 'update');
        Route::delete('coupon/delete/{id}', 'destroy');
    });
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');