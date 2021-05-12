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

    function cart_newUrl($session) {

        // empty crystal array that will be filled inside the foreach loop
        // with product information
        $crystal = [
            'products' => [], 
            'total_sum' => 0, 
        ];
        
        // crystal array is getting filled with product information from cart
        foreach ($session as $products => $product) {
            $crystal_product_array = [
                'title' => $product['name'], 
                'price' => (float)$product['price'], 
                'quantity' => (int)$product['qty'], 
            ];

            // each product is getting pushed into crystal array
            array_push($crystal['products'], $crystal_product_array);

            $crystal['total_sum'] += $product['price'] * $product['qty'];
        }

        $newURL = 'https://akido.ge/vendor_login/7708?cart='.urlencode(json_encode($crystal));
        
        return $newURL;
    }
}