<?php

namespace App\Classes;

class Crystal
{
    function newUrl($product) {

        $crystal_product = [
            'title' => $product->name, 
            'price' => real_price($product), 
            'quantity' => 1, 
        ];

        $crystal_cart = array(
            'products' => [$crystal_product], 
            'total_sum' => $crystal_product['price'], 
        );

        $newURL = 'https://akido.ge/vendor_login/7708?cart='.urlencode(json_encode($crystal_cart));
        
        return $newURL;
    }
}