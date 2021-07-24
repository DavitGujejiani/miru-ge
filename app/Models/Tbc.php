<?php

namespace App\Models;


use GuzzleHttp\Client;

class Tbc
{
    /**
     * Returns new tbc access token as a string
     *
     * @return void
     */
    public function accessToken()
    {
        $client = new Client();
        $response = $client->post('https://api.tbcbank.ge/oauth/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic SJERadsuasdauYjRvOVZuYXhJk9UMFdZN3E4UTdYeRGxpR1U6MHR1UVY0aGFMYXRhdFljSw==',
            ],
            'auth' => [
                $this->info('appKey'), // as username
                $this->info('appSecret'), // as password
            ],
            'form_params' => [
                'grant_type' => 'client_credentials',
                'scope' => 'online_installments',
            ],
        ])->getBody();
        return json_decode((string)$response)->access_token;
    }

    public function info($key)
    {
        $info = [
            'merchantKey' => '400287934-92de983b-eba9-4a04-8253-0d1f373215e4',
            'campaignId' => '529',
            'appKey' => 'nGCD6mE0VK1VPRu4Lsg8AAN7rjTH1DGc',
            'appSecret' => 'DwabAPfiHoYVbZCk',
        ];

        return $info[$key];
    }
}
