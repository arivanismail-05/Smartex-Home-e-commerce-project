<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
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

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});
