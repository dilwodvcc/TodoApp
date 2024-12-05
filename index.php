<?php
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