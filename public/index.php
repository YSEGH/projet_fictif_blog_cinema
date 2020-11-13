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
    ->post("/admin", 'signin', 'signin')

    ->get("/dashboard", 'dashboard', 'dashboard')

    ->get("/dashboard/articles_gestion", 'admin/posts_gestion', 'posts_gestion')
    ->get("/dashboard/articles_gestion/delete_post/[*:slug]-[i:id]", 'admin/delete/deletePost', 'deletePost')
    ->post("/dashboard/articles_gestion/update_post/[*:slug]-[i:id]", 'admin/update/updatePost', 'updatePost')
    ->post("/dashboard/articles_gestion/add_post", 'admin/add/addPost', 'addPost')

    ->get("/dashboard/films_gestion", 'admin/movies_gestion', 'movies_gestion')
    ->get("/dashboard/films_gestion/delete_movie/[*:slug]-[i:id]", 'admin/delete/deleteMovie', 'deleteMovie')
    ->post("/dashboard/films_gestion/update_movie/[*:slug]-[i:id]", 'admin/update/updateMovie', 'updateMovie')
    ->post("/dashboard/films_gestion/add_movie", 'admin/add/addMovie', 'addMovie')

    ->get("/disconnect", 'admin/disconnect', 'disconnect')

    ->get("/actualites", 'news', 'news')
    ->get("/actualites/[*:slug]-[i:id]", 'news/newsPage', 'newsPage')

    ->get("/films", 'movies', 'movies')
    ->get("/films/[*:slug]-[i:id]", 'movie/moviePage', 'moviePage');
$router->run();