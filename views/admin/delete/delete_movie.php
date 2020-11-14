<?php

use App\Classe\Movie\Movie;

session_start();

if (isset($_SESSION['auth'])) {
    Movie::deleteMovie($params['slug'], $params['id']);
    header('Location: ' . $_SESSION['LAST_URI']);
}