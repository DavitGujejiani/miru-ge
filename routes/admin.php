<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/product/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/product/store', [ProductsController::class, 'store'])->name('admin.store');
