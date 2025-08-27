<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('ad_2005_min')->middleware('guest:admin')->group(function () {

    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('ad_2005_min')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('sub-categories', SubCategoryController::class)->names('admin.sub-categories');
    Route::resource('brands', BrandController::class)->names('admin.brands');
    Route::resource('banners', BannerController::class)->names('admin.banners');
    Route::resource('products', ProductController::class)->names('admin.products');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('discounts', DiscountController::class)->names('admin.discounts');
    Route::get('products/{product}/images', [ProductController::class, 'images'])
        ->name('admin.products.images');

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});
