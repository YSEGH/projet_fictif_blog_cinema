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
    <body class="d-flex flex-column min-vh-100">
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
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter" href="<?= $router->generate('home') ?>">Accueil</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter" href="<?= $router->generate('news') ?>">Actualités</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter" href="<?= $router->generate('movies') ?>">Films</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter" href="">Lorem ipsum</a></li>
                    <li><a class="btn btn-dark rounded-0 font-weight-lighter" href="">Lorem ipsum</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>

        <?= $content ?>        

        <footer id="section" class="section-footer mt-auto d-flex justify-content-around align-items-center">
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
