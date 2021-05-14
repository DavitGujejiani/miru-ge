<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request) {
        // request()->validate([
        //     'name_en' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u', 
        //     'name' => 'required', 
        //     'movement' => 'required', 
        //     'sex' => 'required', 
        //     'price' => 'required', 
        //     'description' => 'required', 
        //     'image' => 'required', 
        // ]);
        return $request;
        // $storeProduct = Product::create([
        //     'name_en' => $request->name, 
        // ]);
    }
}
