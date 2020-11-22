<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
if (isset($_SESSION['LAST_URI'])) {
    unset($_SESSION['LAST_URI']);
}



$_SESSION['LAST_URI'] = $_SERVER['REQUEST_URI'];

$currentPage = (int)($_GET['page'] ?? 1) ?: 1;
if($currentPage == 0){
    throw new Exception('Le numéro de page est invalide.');
}

define('PER_PAGE', 6);

$data = new DataHelper;
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

<div class="row justify-content-between align-items-center p-5" style="min-height: auto;">
    <h3 class="col-md-8 col-12 mb-md-0 mb-3 text-white text-md-left text-center text-uppercase font-weight-light"><i class="fa fa-list" aria-hidden="true"></i> Liste des films</h3>
    <a href="<?= $router->generate('add_movie') ?>" class="col-md-2 col-12 btn btn-warning font-weight-lighter mt-auto rounded-0 ">Ajouter un film</a>
</div>
    
<table class="table table-striped m-auto px-5" style="width: 80vw;">
    <thead>
        <tr class="text-left">
            <th scope="col" class="col-auto text-left text-white">ID</th>
            <th scope="col" class="col-auto text-left text-white">Nom</th>
            <th scope="col" class="col-auto text-left text-white">Créé le</th>
            <th scope="col" class="col-auto"></th>
            <th scope="col" class="col-auto"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($movies as $movie) : ?>
        <tr>
            <th class="col-auto align-middle text-truncate text-left text-white" scope="row"> <?= $movie->id ?> </th>
            <td class="col-auto align-middle text-truncate text-left text-white"> <?= substr($movie->name, 0, 30) . '...' ?> </td>
            <td class="col-auto align-middle text-truncate text-left text-white"> <?= $movie->getCreatedAt()->format('d F Y') ?> </td>
            <td class="col-auto align-middle"><a href="<?= $router->generate('update_movie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-primary font-weight-lighter rounded-0 ">Modifier</a></td>
            <td class="col-auto align-middle"><a href="<?= $router->generate('delete_movie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-danger font-weight-lighter rounded-0 ">Supprimer</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="section-movies-buttonsPage d-flex justify-content-between my-5">
    <?php if ($currentPage > 1) : ?>
        <?php $link = $router->generate('movies_list');?>
        <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
        <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
    <?php endif ?>  
    <?php if ($currentPage < $pages) : ?>
        <a href="<?= $router->generate('movies_list') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
    <?php endif ?> 
</div>
