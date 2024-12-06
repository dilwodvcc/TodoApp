<?php
require 'vendor/autoload.php';
$dotevn =  \Dotenv\Dotenv::createImmutable(__DIR__);
$dotevn->load();

$botToken = $_ENV['BOT_TOKEN'] ?? null;

if (!$botToken) {
    die("BOT_TOKEN aniqlanmadi. .env faylni tekshiring.\n");
}
