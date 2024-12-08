<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Bot
{
    const string API_URL = "https://api.telegram.org/bot";
    public $client;
    private $token;

    /**
     * @throws GuzzleException
     */
    public function makeRequest($method, $data = []): \Psr\Http\Message\ResponseInterface
    {
        $this->token = $_ENV['TG_TOKEN'];
        $this->client = new Client([
            'base_uri' => self::API_URL . $this->token . '/',
            'timeout'  => 5.0,
        ]);
        return $this->client->request('POST', $method, ['json' => $data]);
    }
    public function sendMessageWithKeyboard($chatId, $message, $keyboard): void
    {
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => false
            ])
        ];
        file_get_contents(self::API_URL . $this->token ."sendMessage?" . http_build_query($data));
    }
}