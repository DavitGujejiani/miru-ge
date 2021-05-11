<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name_url',
        'name',
        'movement',
        'gender',
        'is_new',
        'price',
        'is_discounted',
        'discount_price',
        'show_on_website',
        'description',
    ];

    /**
     * gets value from database by row id and column name
     *
     * @param [intiger] $row_id
     * @param [text] $column_name
     * @return void
     */
    public static function getColumn($row_id, $column_name) 
    {
        $value = Product::where('id', $row_id)->get()[0]->attributes[$column_name];

        return $value;
    }

    /**
     * currently unused
     * operator options: 'featured', 'new', 'discounted';
     *
     * @param [text] $opearator
     * @return void
     */
    public static function product_is($opearator) {
        $products = Product::where('is_'.$opearator, 1)->get();

        return $products;
    }
}
