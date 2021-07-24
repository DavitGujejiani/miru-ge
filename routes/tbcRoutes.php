<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TbcController;

Route::post('/tbc/send-invoice', [TbcController::class, 'sendInvoice'])->name('tbc.sendInvoice');