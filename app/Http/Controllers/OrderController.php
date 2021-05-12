<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) {

        // $data['coupon'] = (session('coupon') !== null) ? session('coupon')['code'] : null ;
        
        $data = $request->all();
        foreach (session('cart') as $item) {
            $storeOrder = Order::create([
                'product_name' => $item['name'], 
                'product_qty' => $item['qty'], 
                'product_price' => $item['price'], 
                'product_full_price' => $item['price'] * $item['qty'], 
                // 'coupon' => $data['coupon'], 
                'name' => $data['name'], 
                'lastname' => $data['lastname'], 
                'region' => $data['region'], 
                'street' => $data['street'], 
                'apartment' => $data['apartment'], 
                'number' => $data['number'], 
                'additional_message' => $data['additional-message'], 
            ]);
        }

        // if ($data['coupon'] !== null) {
        //     Coupon::where('code', $data['coupon'])->increment('used_amount', 1);
        // }
        session()->flush();
        session()->save();
        

        return redirect('/')->with('order_status', 'თქვენი შეკვეთა წარმატებით გაიგზავნა!');
    }
}
