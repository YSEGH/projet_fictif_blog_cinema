<?php

use App\Classe\Post\Post;

session_start();

if (isset($_SESSION['auth'])) {
    Post::deletePost($params['slug'], $params['id']);
    header('Location: ' . $_SESSION['LAST_URI']);
} else {
    header('Location: /');
}