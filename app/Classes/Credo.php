<?php

namespace App\Classes;

class Credo
{
    function json_encoded($product = null) {

        // Generates random number to be used in credo->orderCode
        $random_order_code = rand(1000, 1000000);

        // Product information will be imploded inside this
        // empty variable and then will be turned into md5 format and
        // will be assigned to $credo['check'].
        $check = '';

        // Empty credo array that will be filled
        // with information about products
        // that are saved inside session "cart".
        $credo = array(
            'merchantId' => '12928', 
            'orderCode' => $random_order_code, 
            'check' => '', 
            'products' => []
        );

        // If user is accessing credo button from mycart page
        // loop will be used for multiple products
        if ($product === null) {
            // If user is accessing credo button from mycart Page

            // Every product's information that's in the
            // php session named "shopping_cart" is pushed into
            // credo array using this foreach loop below.
            foreach (session('cart') as $items => $item):
                $product_array = array(
                    'id' => $item['id'], 
                    'title' => $item['name'], 
                    'amount' => $item['qty'], 
                    'price' => $item['price'] * 100, 
                    'type' => $this->isMobile()
                );
                
                // Pushes $products_array values into $credo['products'] array
                // each time loop is run
                array_push($credo['products'], $product_array);
                
                // Product information is being imploded to this empty variable
                // which is created outside of a loop
                $check .= implode(',', $product_array);  
            endforeach;
            
        } else {
            // If user is accessing credo button from single-product Page
            // single product information is being pushed into credo array
            $product_array = array(
                'id' => $product->id, 
                'title' => $product->name, 
                'amount' => 1, 
                'price' => real_price($product) * 100, 
                'type' => $this->isMobile()
            );

            // Pushes $products_array values into $credo['products'] array
            // each time loop is run
            array_push($credo['products'], $product_array);
            
            // Product information is being imploded to this empty variable
            // which is created outside of a loop
            $check .= implode(',', $product_array);  
        }

        // Product information inside $check variable is
        // being convertet to md5 format and assigned to $credo['check'] key.
        $credo['check'] = md5($check);

        // Encoding array to json string 
        // This information goes to input value on page
        $credo_json_encoded = json_encode($credo);

        return $credo_json_encoded;
    }

    function isMobile() 
    {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}