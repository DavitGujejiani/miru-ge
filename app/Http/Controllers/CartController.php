<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function store(Request $request, $id) {
        $cart = session('cart');
        $watch = Product::find($id);
        $qty = $request->qty > 0 ? (int)$request->qty : 1;

        // if cart is empty -- put first product
        if ( !$cart ) {
            $cart = [
                $id => [
                    'id' => $id, 
                    'name' => $watch->name, 
                    'name_en' => $watch->name_en, 
                    'image' => $watch->image,
                    'price' => real_price($watch), 
                    'undiscountedPrice' => real_price($watch), 
                    'qty' => $qty 
                ]
            ];
            // put watch in session
            session()->put('cart', $cart);
            Session::save();
            return redirect()->back();
        }
        // if cart is not empty check if product exist, if does -- increment qty
        if (isset($cart[$id])) 
        {
            // $cart array already exists
            $cart[$id]['qty'] += $qty;
            session()->put('cart', $cart);
            Session::save();

            return redirect()->back();
        }

        // if item doesn't exist in cart -- store
        $cart[$id] = [
            'id' => $id, 
            'name' => $watch->name, 
            'name_en' => $watch->name_en, 
            'image' => $watch->image, 
            'price' => real_price($watch), 
            'originalPrice' => real_price($watch), 
            'qty' => $qty
        ];

        if ( null !== session('coupon') ) {
            /**
             * if discount coupon is in use:
             * changes the price to discounted price
             */
            $cart[$id]['price'] = $this->discount($cart[$id]['price'], session('coupon')['percent']);
        }

        session()->put('cart', $cart);
        Session::save();
        
        return redirect()->back();
    }

    public function remove($id) 
    {
        if (session('cart') !== null) 
        {
            $cart = session('cart'); // puts session arrays into variable
            
            unset($cart[$id]); // removes product that contains id
            session()->put('cart', $cart); // puts array without product back to session
            Session::save();
            
            return redirect()->back();
        }
    }

    public function changeQty($id, $newQty) 
    {
        if (session('cart') !== null) {

            $cart = session('cart'); // puts session arrays into variable
            
            $cart[$id]['qty'] = $newQty; // assigns new quantity to product with the id

            session()->put('cart', $cart); // puts updated array back to session 

            Session::save();
            
            return redirect()->back();
        }
    }

    public function empty() 
    {
        if (session('cart') !== null) {
            session()->flush();
            session()->save();
            return redirect()->back();
        }
    }

    public function discount($price, $percent) 
    {
        // my 530.000 IQ discount formula
        $price = $price - $price / 100 * $percent;
        return $price;
    }
}


