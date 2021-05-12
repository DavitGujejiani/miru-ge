<?php

// urlize string
if (! function_exists('urlize')) {
    function urlize($string) 
    {

        $url = str_replace(' ', '-', $string);
        $url = str_replace('/', '-', $url);
        $url = str_replace('(', '', $url);
        $url = str_replace(')', '', $url);
        $url = str_replace('----', '-', $url);
        $url = str_replace('---', '-', $url);
        $url = str_replace('--', '-', $url);
        $url = strtolower($url);
        
        return $url;
    }
}

// urlizes product from object
if (! function_exists('urlize_product')) {
    function urlize_product(&$key) 
    {

        if (gettype($key) === 'object') {
            $url = urlize($key->name_en);

            return '/watch/' . $key->id . '/' . $url;
        }

        if (gettype($key) === 'array') {
            $url = urlize($key['name']);

            return '/watch/' . $key['id'] . '/' . $url;
        }
    }
}

if (! function_exists('product_images')) {
    function product_images($item) {
        if (gettype($item) === 'object') {
            $source = asset('/images/product-image/' . $item->image);
        }
        if (gettype($item) === 'array') {
            $source = asset('/images/product-image/' . $item['image']);
        }
        return $source;
    }
}

// translates movement type from en to ge
if (! function_exists('watch_movement')) {
    function watch_movement($type) 
    {
        $types = [
            'quartz' => 'კვარცი',
            'mechanical' => 'მექანიკური',
            'chronograph' => 'ქრონოგრაფი',
        ];

        return $types[$type];
    }
}

// translates gender from en to ge
if (! function_exists('watch_gender')) {
    function watch_gender($sex) 
    {
        $genders = [
            'men' => 'მამაკაცი',
            'women' => 'ქალი',
            'unisex' => 'უნისექსი',
        ];

        return $genders[$sex];
    }
}

// Checks if product is discounted and returns current active price
if (! function_exists('real_price')) {
    function real_price(&$product) {

        if (gettype($product) == 'object')
        {
            $realPrice = ($product->is_discounted ? $product->discount_price : $product->price);
        }
        if (gettype($product) == 'array')
        {
            $realPrice = ($product['is_discounted'] ? $product['discount_price'] : $product['price']);
        }

        return $realPrice;
    }
}

