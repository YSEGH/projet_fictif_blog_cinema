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
    ->get("/", 'home', 'home')

    ->post("/admin", 'admin/signin', 'signin')
    ->get("/dashboard", 'admin/dashboard', 'dashboard')
    ->post("/dashboard/homepage_builder", 'admin/homepage/homepage_builder', 'homepage_builder')

    ->get("/dashboard/posts_list", 'admin/posts_list', 'posts_list')
    ->get("/dashboard/posts_list/delete_post/[*:slug]-[i:id]", 'admin/delete/delete_post', 'delete_post')
    ->post("/dashboard/posts_list/update_post/[*:slug]-[i:id]", 'admin/update/update_post', 'update_post')
    ->post("/dashboard/posts_list/add_post", 'admin/add/add_post', 'add_post')

    ->get("/dashboard/movies_list", 'admin/movies_list', 'movies_list')
    ->get("/dashboard/movies_list/delete_movie/[*:slug]-[i:id]", 'admin/delete/delete_movie', 'delete_movie')
    ->post("/dashboard/movies_list/update_movie/[*:slug]-[i:id]", 'admin/update/update_movie', 'update_movie')
    ->post("/dashboard/movies_list/add_movie", 'admin/add/add_movie', 'add_movie')

    ->get("/disconnect", 'admin/disconnect', 'disconnect')

    ->get("/actualites", 'post/posts_page', 'posts_page')
    ->get("/actualites/[*:slug]-[i:id]", 'post/post_page', 'post_page')

    ->get("/films", 'movie/movies_page', 'movies_page')
    ->get("/films/[*:slug]-[i:id]", 'movie/movie_page', 'movie_page');
$router->run();