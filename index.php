<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'src/Todo.php';
require 'helpers.php';

$todo = new Todo();

if ($uri == '/') {
    $todos = $todo->get();
    view('home', ['todos' => $todos]);
} elseif ($uri == '/store') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $todo->store($_POST['title'], $_POST['due_date'], $_POST['status']);
    }
    header('Location: /');
    exit();
} elseif ($uri == '/update-status') {
    if (isset($_GET['id']) && isset($_GET['status'])) {
        $todo->updateStatus($_GET['id'], $_GET['status']);
    }
    header('Location: /');
    exit();
}
