<?php
class Router
{
    public $currentRoute;

    public function __construct()
    {
        // Joriy yo'nalishni olish
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    // Dinamik yo'nalishlarni ishlatish
    public function resolveRoute($route, $callback, $method): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== $method) {
            return;
        }

        // Yo'nalishni {id} kabi o'zgaruvchilarni regexga o'zgartirish
        $pattern = preg_replace('/\{([a-zA-Z_]+)\}/', '([^/]+)', $route);
        $pattern = "~^" . $pattern . "$~";

        // Joriy yo'nalish bilan o'zgaruvchilarni moslashtirish
        if (preg_match($pattern, $this->currentRoute, $matches)) {
            array_shift($matches); // To'liq moslashuvni olib tashlash
            $callback(...$matches); // Parametrlarni callback funksiyasiga uzatish
            exit();
        }
    }

    // GET so'rovi
    public function getRoute($route, $callback): void
    {
        $this->resolveRoute($route, $callback, 'GET');
    }

    // POST so'rovi
    public function postRoute($route, $callback): void
    {
        $this->resolveRoute($route, $callback, 'POST');
    }
}
