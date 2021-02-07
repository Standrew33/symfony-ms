<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 07.02.2021
 * Time: 20:40
 */

namespace App\Service;

use GuzzleHttp\Client;

class GuzzleService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function buildRequest(string $url, string $method, array $parrams = []): string
    {
        $response = $this->client->request($method, $url, $parrams);
        return $response->getBody()->getContents();
    }
}