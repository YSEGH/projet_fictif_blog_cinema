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


<?php foreach($movies as $movie) : ?>
    <div class="movies_page-item row flex-md-row flex-column justify-content-center align-items-center my-4">
        <a href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id])?>" class="col-md-3 col-6 p-0">
            <div class="col-12 movies_page-item-photo" style="background-image: url(<?= $movie->photo ?>);"></div>
        </a>
        <div class="movies_page-item-body col-md-5 col-6 d-flex flex-column justify-content-between align-items-md-start align-items-center px-4 pt-4 pb-2 text-justify">
            <a  href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id])?>">
                <h5 class="text-uppercase  text-center font-weight-light"><?= $movie->name ?></h5>
            </a>
            <p class="font-weight-light text-white"><?= substr($movie->resume, 0, 150) ?></p>
            <ul class="d-flex justify-content-md-start justify-content-center p-0">
                <?php $categories = Movie::recupCategories($movie->id)?>
                <?php foreach($categories as $category) : ?>
                    <li><a class="badge badge-warning text-white font-weight-light rounded-0 mr-1 text-white" href=""><?= $category->name ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endforeach ?>

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
