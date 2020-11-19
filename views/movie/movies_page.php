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

<div class="row justify-content-center align-items-center mt-4" style="height: 11vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> Films</h3>
</div>  

<div class="movies-container container p-5">
<?php foreach($movies as $movie) : ?>
<div class="row justify-content-between align-items-center p-3" >
    <div class="movies-container-photo col-md-4 col-sm-12" style="background-image: url(<?= $movie->photo ?>);"></div>
    <div class="movies-container-body d-flex flex-column justify-content-between align-items-start px-4 pt-4 pb-2 col-md-6 col-sm-12 text-justify">
        <a  href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id])?>"><h5 class="text-uppercase font-weight-light text-white"><?= $movie->name ?></h5></a>
        <p class="font-weight-light text-white"><?= substr($movie->resume, 0, 150) ?></p>
        <ul class="d-flex p-0">
            <?php $categories = Movie::recupCategories($movie->id)?>
            <?php foreach($categories as $category) : ?>
                <li><a class="badge font-weight-light rounded-0 mr-1 text-white" style="background-color: #EF6962;" href=""><?= $category->name ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="movies-container-buttons col-md-2 col-sm-12 my-auto d-flex flex-column justify-content-center align-items-center">
        <a class="btn btn-dark font-weight-lighter rounded-0 m-1" href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id])?>">Infos</a> 
        <a href="#myModal<?=$movie->id?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" data-toggle="modal" >Séances</a>            
    </div>
</div>
<?php require '../views/movie/seanceModal.php' ?>
<?php endforeach ?>
</div>
<div class="section-movies-buttonsPage row d-flex justify-content-between my-5 w-100">
    <?php if ($currentPage > 1) : ?>
        <?php $link = $router->generate('movies_page');?>
        <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
        <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
    <?php endif ?>   
    <?php if ($currentPage < $pages) : ?>
        <a href="<?= $router->generate('movies_page') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
    <?php endif ?> 
</div>
