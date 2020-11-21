<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

if ((int)$_GET['page'] === 1) {
    header('Location: ' . $router->generate('movies_page'));
}
$title = "Films";
$data = new DataHelper;
$currentPage = (int)($_GET['page'] ?? 1) ?: 1;
if($currentPage == 0){
    throw new Exception('Le numéro de page est invalide.');
}
define('PER_PAGE', 4);
$count = $data->countData('movie');
$pages = ceil($count / PER_PAGE);
if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}
$offset = PER_PAGE * ($currentPage - 1);
$movies = Movie::getAllMovies(PER_PAGE, $offset);


?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-4" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> Films</h3>
</div>  

<div class="cards-actualite row d-flex flex-wrap justify-content-center">
    <?php foreach ($movies as $movie) : ?>
        <a href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="movies_page-item d-flex justify-content-center col-md-10 col-5 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
            <?php require dirname(__DIR__) .'/admin/homepage/movie_card.php'?>
        </a>
    <?php endforeach ?>
</div>

<div class="movies_page-buttons row d-flex justify-content-between my-5">
    <?php if ($currentPage > 1) : ?>
        <?php $link = $router->generate('movies_page');?>
        <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
        <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
    <?php endif ?>   
    <?php if ($currentPage < $pages) : ?>
        <a href="<?= $router->generate('movies_page') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
    <?php endif ?> 
</div>
