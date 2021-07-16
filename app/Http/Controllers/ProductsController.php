<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{
    public function store(Request $request) {
        $img_name = [
            null,
            null,
            null,
            null,
        ];
        // dd($request);
        if ($request->hasFile('images')) {
            foreach($request->file('images') as $loop_id => $file)
            {
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path().'/images/product-image/', $filename);  
                $img_name[$loop_id] = "$filename";
            }
        }
        
        $storeProduct = Product::create([
            'name_en' => $request->name_en, 
            'name' => $request->name, 
            'movement' => $request->movement, 
            'sex' => $request->sex, 
            'is_new' => $request->is_new ?? false, 
            'price' => $request->price, 
            'is_discounted' => $request->is_discounted ?? false,
            'discount_price' => $request->discount_price ?? null, 
            'show_on_website' => $request->show_on_website ?? false, 
            'is_featured' => (bool)$request->featured ?? false, 
            'description' => $request->description, 
            'list_description' => $request->list_description, 
            'image' => $img_name[0], 
            'image_2' => $img_name[1], 
            'image_3' => $img_name[2], 
            'image_4' => $img_name[3], 
        ]);
        
        return redirect()->back()->withErrors(['success' => 'პროდუქტი წარმატებით აიტვირთა!']);
        
    }
}
