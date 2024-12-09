<?php

use App\Bot;

$bot = new Bot();

$input = file_get_contents('php://input');
$update = json_decode($input,true);


if (isset($update['message'])) {
    $message = $update['message'];
    if (isset($message['text'])) {
        $text = $message['text'];
        if ($text == '/start') {
            $welcomeMessage = "Assalomu alaykum! 😊\n
                Abdullohning telegram botiga xush kelibsz!";
            $bot->sendMessageWithKeyboard($message['chat']['id'], $welcomeMessage, [["WEATHER"], ["CURRENCIES"]]);
            $response = "💵 valyuta almawinw  hali bizada mavjud emas!";


            $bot->makeRequest('sendMessage', [
                'chat_id' => $message['chat']['id'],
                'text' => 'Welcome!  This is a telegram bot of Abdullloh. To know about currencies, type "/currency"',
                'reply_markup' => json_encode([
                    'resize_keyboard' => true,
                    'keyboard' => [
                        [['text' => 'Ob havo'], ['text' => 'Btn1']]
                    ],
                ]),
            ]);
        }
    }
}