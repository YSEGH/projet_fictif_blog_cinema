<?php
session_start();
?>

<!doctype html>
<html lang="Fr">
    <head>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?= $title ? $title : "Mon site" ?></title>
      <link rel="stylesheet" href="http://localhost:8000/css/main.css" type="text/css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100 justify-content-around align-items-center m-0 p-0">
        <header id="section" class="section-header">
          <div class="fixed-top">
            <nav class="navbar navbar-light bg-transparent d-flex align-items-center">
              <a href="<?= $router->generate('home') ?>" class="icon-site bg-warning mt-2"></a>
              <button class="navbar-toggler border-secondary bg-transparent text-dark ml-auto " type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </nav>
            <div class="collapse ml-auto" id="navbarToggleExternalContent">
              <div class="d-flex justify-content-end p-4 bg-transparent">
                <ul>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="<?= $router->generate('home') ?>">Accueil</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="<?= $router->generate('posts_page') ?>">Actualités</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="<?= $router->generate('movies_page') ?>">Films</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="">Lorem ipsum</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="">Lorem ipsum</a></li>
                    <?php if (isset($_SESSION['auth'])) : ?>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="<?= $router->generate('dashboard') ?>">Tableau de bord</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter w-100" href="<?= $router->generate('disconnect') ?>">Me déconnecter</a></li>
                    <?php endif ?>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <div class="container-body w-100 m-0 p-0 <?php if (isset($_SESSION['auth']) && strpos($_SERVER['REQUEST_URI'], 'dashboard') !== FALSE) : ?> d-flex flex-column justify-content-around align-items-center m-0 p-5<?php endif ?>">
          <?php if (isset($_SESSION['auth']) && strpos($_SERVER['REQUEST_URI'], 'dashboard') !== FALSE) : ?>
            <ul class="navbar-nav w-100 mx-auto p-0 d-flex flex-row justify-content-center align-items-center mt-5">
                <li class="nav-item"><a class="nav-link p-2 btn <?php if (strpos($_SERVER['REQUEST_URI'], 'homepage_builder') !== FALSE) : ?>btn-light border <?php else : ?> btn-dark <?php endif ?> rounded-0 font-weight-lighter w-100" href="<?= $router->generate('homepage_builder') ?>">Page d'accueil</a></li>
                <li class="nav-item"><a class="nav-link p-2 btn <?php if (strpos($_SERVER['REQUEST_URI'], 'posts_list') !== FALSE) : ?> btn-light border <?php else : ?> btn-dark <?php endif ?> rounded-0 font-weight-lighter w-100" href="<?= $router->generate('posts_list') ?>">Liste des articles</a></li>
                <li class="nav-item"><a class="nav-link p-2 btn <?php if (strpos($_SERVER['REQUEST_URI'], 'movies_list') !== FALSE) : ?> btn-light border <?php else : ?> btn-dark <?php endif ?> rounded-0 font-weight-lighter w-100" href="<?= $router->generate('movies_list') ?>">Liste des films</a></li>
                <li class="nav-item"><a class="nav-link p-2 btn <?php if (strpos($_SERVER['REQUEST_URI'], 'newsletter') !== FALSE) : ?> btn-light border <?php else : ?> btn-dark <?php endif ?>  rounded-0 font-weight-lighter w-100" href="">Newsletter</a></li>
                <li class="nav-item"><a class="nav-link p-2 btn <?php if (strpos($_SERVER['REQUEST_URI'], 'infos_generales') !== FALSE) : ?> btn-light border <?php else : ?> btn-dark <?php endif ?>  rounded-0 font-weight-lighter w-100" href="">Mise à jour infos</a></li>
                <li class="nav-item"><a class="nav-link p-2 btn btn-dark  rounded-0 font-weight-lighter w-100" href="<?= $router->generate('disconnect') ?>">Me déconnecter</a></li>
            </ul>         
          <?php endif ?>
          <?= $content ?> 
        </div>
                
        <footer id="section" class="section-footer w-100 mt-auto d-flex justify-content-around align-items-center">
            <?php if(defined('DEBUG_TIME')): ?>
                <?= "Page générée en " . round(1000 * (microtime(true) - DEBUG_TIME)) . " ms" ?>
            <?php endif ?>
          <ul>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            </ul>
          <ul>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            </ul>
          <ul>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            <li><a href="" class="font-weight-lighter">Lorem ipsum</a></li>
            </ul>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzSwfs1pICcdHq1glTuTDqLqxljH7jdTM&callback=initMap_1&map_ids=168c94dbe1fb00b3"></script>
        <script src="http://localhost:8000/js/main.js"></script>
        <script src="http://localhost:8000/js/map_style.js"></script>
        <script src="http://localhost:8000/js/map.js"></script>
    </body>
</html>
