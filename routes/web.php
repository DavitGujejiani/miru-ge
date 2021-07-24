<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/search', [PagesController::class, 'search'])->name('pages.search');
Route::get('/watch/{id}/{name}', [PagesController::class, 'watch'])->name('pages.watch');
Route::get('/watches', [PagesController::class, 'watches'])->name('pages.watches');
Route::get('/cart', [PagesController::class, 'cart'])->name('pages.cart');
Route::post('/checkout', [PagesController::class, 'checkout'])->name('pages.checkout');

Route::group(['prefix' => 'cart', ], function() {
    Route::post('store/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::post('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('empty/', [CartController::class, 'empty'])->name('cart.empty');
    Route::get('changeQty/{id}/{newQty}', [CartController::class, 'changeQty'])->name('cart.changeQty');
});

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/tbcRoutes.php';
