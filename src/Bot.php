<?php

namespace App;

use GuzzleHttp\Client;

class Bot
{
    private $botToken;
    private $client;

    public function __construct($botToken)
    {
        $this->botToken = $botToken;
        $this->client = new Client();
    }

    public function getMe()
    {
        $response = $this->client->request('GET', "https://api.telegram.org/bot{$this->botToken}/getMe");
        return json_decode($response->getBody(), true);
    }
}
