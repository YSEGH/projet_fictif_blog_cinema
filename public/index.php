<?php

use App\Classe\Router\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$router = new AltoRouter();

$router = new Router(dirname(__DIR__) . '/views');

$router
    ->get("/home", 'home', 'home')
    ->get("/programme", 'movie', 'programme');

$router->run();