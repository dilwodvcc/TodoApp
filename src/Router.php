<?php
class Router
{
    public $cuttenRoute;
    public function __construct()
    {
        $this->cuttenRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    public function getRoute($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $this->cuttenRoute == $route) {
            $callback();
            exit();
        }
    }
    public function postRoute($route, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->cuttenRoute == $route) {
            $callback();
            exit();
        }
    }
}