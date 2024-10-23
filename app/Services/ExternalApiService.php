<?php
namespace App\Services;

use GuzzleHttp\Client;

class ExternalApiService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchExternalData($url)
    {
        $response = $this->client->get($url);
        return json_decode($response->getBody()->getContents(), true);
    }
}
