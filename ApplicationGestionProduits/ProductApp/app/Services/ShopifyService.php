<?php

namespace App\Services;

use GuzzleHttp\Client;

class ShopifyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://' . env('SHOPIFY_STORE') . '.myshopify.com/admin/api/2023-01/',
            'headers' => [
                'X-Shopify-Access-Token' => env('SHOPIFY_ACCESS_TOKEN'),
            ],
        ]);
    }

    public function getProducts()
    {
        $response = $this->client->get('products.json');
        return json_decode($response->getBody(), true);
    }
}
