<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_name',
        'product_qty',
        'product_price',
        'product_full_price',
        'coupon',
        'name',
        'lastname',
        'region',
        'street',
        'apartment',
        'number',
        'additional_message',
    ];

    protected $casts = [
        'order_made_at' => 'datetime',
    ];
}
