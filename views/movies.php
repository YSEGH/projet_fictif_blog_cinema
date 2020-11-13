<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

if ((int)$_GET['page'] === 1) {
    header('Location: ' . $router->generate('movies'));
}

$currentPage = (int)($_GET['page'] ?? 1) ?: 1;
if($currentPage == 0){
    throw new Exception('Le numéro de page est invalide.');
}

$title = "Films";
define('PER_PAGE', 4);
$data = new DataHelper;
$count = $data->countData('movie');
$pages = ceil($count / PER_PAGE);

if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}

$offset = PER_PAGE * ($currentPage - 1);
$movies = $data->recupTable('movie', PER_PAGE, $offset, Movie::class);
?>

<section class="section-movies-movies container d-flex flex-column align-items-center justify-content-center my-5">
    <h1 class="mt-5 mb-3 align-self-start text-uppercase text-dark font-weight-normal">Films</h1>
    <div class="movies-container">
        <?php foreach($movies as $movie) : ?>
        <div class="d-flex justify-content-between align-items-center p-3" style="height: 15rem;">
            <div class="movies-container-photo h-100 w-25 m-2" style="background-image: url(<?= $movie->photo ?>);"></div>
            <div class="w-75 m-2 text-justify">
                <a  href="<?= $router->generate('moviePage', ['slug' => $movie->slug, 'id' => $movie->id])?>"><h3 class="text-uppercase font-weight-light text-dark"><?= $movie->name ?></h3></a>
                <p class="font-weight-light text-dark"><?= substr($movie->resume, 0, 150) ?></p>
                <ul class="d-flex p-0">
                    <?php $categories = $data->many("SELECT * 
                                                     FROM movie_has_moviecategory 
                                                     JOIN moviecategory ON movie_has_moviecategory.moviecategory_id = moviecategory.id
                                                     WHERE movie_has_moviecategory.movie_id = $movie->id") 
                    ?>
                    <?php foreach($categories as $category) : ?>
                        <li><a class="badge badge-primary font-weight-light rounded-0 mr-1" href=""><?= $category->name ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="movies-container-buttons my-auto mx-4 d-flex flex-column">
                <a class="btn btn-dark font-weight-lighter rounded-0 m-1" href="<?= $router->generate('moviePage', ['slug' => $movie->slug, 'id' => $movie->id])?>">Infos</a> 
                <a href="#myModal<?=$movie->id?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" data-toggle="modal" >Séances</a>            
            </div>
        </div>
        <?php require '../views/movie/seanceModal.php' ?>
        <?php endforeach ?>
    </div>
    <div class="section-movies-buttonsPage d-flex justify-content-between my-5 w-100">
        <?php if ($currentPage > 1) : ?>
            <?php $link = $router->generate('movies');?>
            <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
            <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
        <?php endif ?>   
        <?php if ($currentPage < $pages) : ?>
            <a href="<?= $router->generate('movies') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
        <?php endif ?> 
        
    </div>
</section>
