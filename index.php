<?php

require 'src/Router.php';
require 'src/Control.php';
require 'helpers.php';

$router = new Router();
$control = new Control();

$router->getRoute('/', [$control, 'home']);
$router->getRoute('/todos', [$control, 'showTodos']);
$router->getRoute('/update', [$control, 'updateTodo']);
$router->postRoute('/todos', [$control, 'storeTodo']);
