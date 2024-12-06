<?php

use GuzzleHttp\Client;

require 'bootstrap.php';
require 'src/Router.php';
require 'src/Control.php';
require 'helpers.php';

$router = new Router();
$control = new Control();

$router->getRoute('/', [$control, 'home']);
$router->getRoute('/todos', [$control, 'showTodos']);
$router->getRoute('/todos/{id}/delete', [$control, 'deleteTodo']);
$router->getRoute('/todos/{id}/edit', function ($id) use ($control) {
    $control->updateTodoForm($id);
});
$router->postRoute('/todos/{id}/edit', function ($id) use ($control) {
    $control->updateTodoData($id);
});
$router->postRoute('/todos', [$control, 'storeTodo']);

$botToken = $_ENV['BOT_TOKEN'] ?? null;
if (!$botToken) {
    die("BOT_TOKEN aniqlanmadi. .env faylni tekshiring.\n");
}

$client = new Client();

try {
    $response = $client->request('GET', "https://api.telegram.org/bot{$botToken}/getMe");

    if ($response->getStatusCode() === 200) {
        $data = json_decode($response->getBody(), true);
        echo "Bot ma'lumotlari:\n";
        print_r($data);
    } else {
        echo "So'rov muvaffaqiyatsiz: " . $response->getReasonPhrase();
    }
} catch (Exception $e) {
    echo "Xato yuz berdi: " . $e->getMessage();
}
