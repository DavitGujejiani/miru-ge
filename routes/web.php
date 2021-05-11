<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/watch/{id}/{name}', [PagesController::class, 'watch'])->name('pages.watch');
Route::get('/watches', [PagesController::class, 'watches'])->name('pages.watches');

Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

