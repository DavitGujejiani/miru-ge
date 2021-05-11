<?php
namespace App\Classes;

class Cart 
{
    public static function total_price() {
        $cart = session('cart');
        
        $totalPrice = 0;
        if ( $cart ) 
        {
            foreach($cart as $loop_id => $item) {
                $totalPrice += $item['qty'] * $item['price'];
            }
        }
        
        return $totalPrice;
    }

    public static function item_amount() {
        $amount = session('cart') ? count(session('cart')) : 0;
        return $amount;
    }
}