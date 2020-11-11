<?php

use App\Classe\Router\Router;

require '../vendor/autoload.php';

define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new AltoRouter();

$router = new Router(dirname(__DIR__) . '/views');

$router
    ->get("/home", 'home', 'home')

    ->get("/actualites", 'news', 'news')
    ->get("/actualites/[*:slug]-[i:id]", 'news/newsPage', 'newsPage')

    ->get("/films", 'movies', 'movies')
    ->get("/films/[*:slug]-[i:id]", 'movie/moviePage', 'moviePage');
$router->run();