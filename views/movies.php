<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

$title = "Films";
define('PER_PAGE', 4);
$data = new DataHelper;
$movies = $data->recupTable('movie', PER_PAGE, null, Movie::class);
?>

<section class="section-movies-movies container my-5">
    <h1 class="mt-5 mb-3">Programme</h1>
    <div class="movies-container">
        <?php foreach($movies as $movie) : ?>
        <div class="d-flex justify-content-between align-items-center p-3" style="height: 15rem;">
            <div class="movies-container-photo h-100 w-25 m-2" style="background-image: url(<?= $movie->photo ?>);"></div>
            <div class="w-75 m-2 text-justify">
                <a class="text-uppercase font-weight-normal text-dark" href=""><h3><?= $movie->name ?></h3></a>
                <p class="font-weight-light text-dark"><?= substr($movie->resume, 0, 150) ?></p>
                <ul class="d-flex p-0">
                    <?php $categories = $data->many($movie) ?>
                    <?php foreach($categories as $category) : ?>
                        <li><a class="badge badge-primary font-weight-light rounded-0 mr-1" href=""><?= $category->name ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="movies-container-buttons my-auto mx-4 d-flex flex-column">
                <a class="btn btn-dark font-weight-lighter rounded-0 m-1" href="<?= $router->generate('moviePage', ['slug' => $movie->slug, 'id' => $movie->id])?>">Infos</a> 
                <a class="btn btn-dark font-weight-lighter rounded-0 m-1">Séances</a>            
            </div>

        </div>
        <?php endforeach ?>
    </div>
</section>
