<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Models\Banner;

Route::group(['prefix' => 'admin',], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('product/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('banners', [AdminController::class, 'bannersShow'])->name('admin.banknersShow');
    Route::get('banners/{id}', function($id) {
        authAdmin();
        return view('admin.bannerShow', ['banner' => Banner::find($id)]);
    })->name('admin.bannerShow');
    Route::post('banners/{id}/update', [AdminController::class, 'bannerUpdate']);
    Route::post('product/store', [ProductsController::class, 'store'])->name('admin.store');
});