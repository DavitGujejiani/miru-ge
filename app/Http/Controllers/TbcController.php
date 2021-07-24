<?php

namespace App\Http\Controllers;

use App\Models\Tbc;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TbcController extends Controller
{
    public function sendInvoice(Tbc $tbc, Request $request) {
        $productInfoJson = $request->get("productInfo");
        $totalPrice = 0;
        
        // get total price
        foreach ( json_decode($productInfoJson) as $item ) {
            $totalPrice += $item->price;
        } 
        
        $product = [
            "merchantKey" => $tbc->info('merchantKey'),
            "priceTotal" => $totalPrice,
            "campaignId" =>	$tbc->info('campaignId'),
            "invoiceId" => time(),
            "products" => json_decode($productInfoJson)
        ];
        $pjson = (string)json_encode($product); // 5. 
        
        // return $pjson;  

        $client = new Client();
        $response = $client->request('POST', 'https://api.tbcbank.ge/v1/online-installments/applications', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$tbc->accessToken()}", 
                'Accept' => '*/*',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection' => 'keep-alive',
            ],
            'body' => $pjson
        ]);

        $locationHeader = $response->getHeader("Location")[0];
        return redirect($locationHeader);
    }
}
