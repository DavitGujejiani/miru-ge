<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use function GuzzleHttp\Promise\all;
use App\Classes\Cart;

class PagesController extends Controller
{
    public function index(Product $product)
    {
        
        $watches = [
            'featured'    => $product::where('is_featured', 1)->get(),
            'men'         => $product::where('sex', 'men')->get(),
            'women'       => $product::where('sex', 'women')->get(),
            'mechanical'  => $product::where('movement', 'mechanical')->get(),
            'chronograph' => $product::where('movement', 'chronograph')->get(),
            'quartz'      => $product::where('movement', 'quartz')->get(),
            
        ];
        // dump($productQueries['featured']);
        return view('pages.index', [
            'watches' => $watches,
        ]);
    }
    
    public function watch(Product $product, $id)
    {
        // get single item
        $item = $product::find($id);
        
        // get same sex and type watches, give real_price key and turn into collection
        $watches = $product::where('sex', $item->sex)->where('movement', $item->movement)->where('id', '!=', $id)->get();
        $watches = $this->giveRealPrice($watches);
        $watchesCollection = collect($watches);
        
        $watchesSortDesc = $watchesCollection->sortByDesc('real_price');
        $watchesSortAsc = $watchesCollection->sortBy('real_price');
        
        $tbcProductInfo = [
            0 => [
                "name" => (string)$item->name,
                "price" => (int)real_price($item),
                "quantity" => 1,
            ],
        ];
        
        return view('pages.watch', [
            'item' => $item,
            'sametypeSortDesc' => $watchesSortDesc,
            'sametypeSortAsc' => $watchesSortAsc,
            'tbcProductInfo' => json_encode($tbcProductInfo),
        ]);
    }
    
    public function search(Product $product)
    {
        $keyword = $_GET['keyword'];
        // get single item
        $watches = $product::where('name', 'like', "%{$keyword}%")
        ->orWhere('name_en', 'like', "%{$keyword}%")
        ->orWhere('movement', 'like', "%{$keyword}%")
        ->orWhere('sex', 'like', "%{$keyword}%")
        ->orWhere('description', 'like', "%{$keyword}%")
        ->orWhere('list_description', 'like', "%{$keyword}%")
        ->get();
        
        return view('pages.watches', [
            'watches' => $watches,
        ]);
    }
    
    public function watches(Product $product, Request $request)
    {
        $type = $request->type;
        $sex  = $request->sex;
        $sort = $request->sort;
        
        $watches = $product::all();
        $watchesCollection = collect($watches);
        
        if (!empty($type)) {
            $watchesCollection = $watchesCollection->where('movement', $type);
        }
        
        if (!empty($sex)) {
            $watchesCollection = $watchesCollection->where('sex', $sex);
        }
        
        if ($sort == 'desc') {
            $watchesCollection = $watchesCollection->sortByDesc('price')->values();
        }
        
        if ($sort == 'asc') {
            $watchesCollection = $watchesCollection->sortBy('price')->values();
        }
        
        
        // return response($watchesCollection, 200);
        return view('pages.watches', ['watches' => $watchesCollection,]);
    }
    
    public function cart()
    {
        return view('pages.cart');
    }
    
    public function checkout(Request $request)
    {
        
        // 'tbilisi' or 'region'
        $region = request('region');
        
        $totalPrice = Cart::total_price();
        
        // total price is incremented by 5 gel if region is 'region'
        if ($region == 'region') {
            $totalPrice += 5;
        }
        
        return view('/pages/checkout', [
            'userRegion' => $region,
            'totalPrice' => $totalPrice,
        ]);
    }
    
    /**
    * creates new key (real_price) inside every array of fetched data
    * from database and assignes value depending on if product
    * is discounted or not
    * 
    * * Parameter should be array that contains newly fetched data from products table
    *
    * @param [array] $array
    * @return void
    */
    public function giveRealPrice($array)
    {
        foreach ($array as $loop_id => $item) :
            $realPrice = $item['is_discounted'] ? $item['discount_price'] : $item['price'];
            $array[$loop_id]['real_price'] = $realPrice;
        endforeach;
        
        return $array;
    }
}
