<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

if (isset($_SESSION['LAST_URI'])) {
    unset($_SESSION['LAST_URI']);
}

session_start();

$_SESSION['LAST_URI'] = $_SERVER['REQUEST_URI'];

$currentPage = (int)($_GET['page'] ?? 1) ?: 1;
if($currentPage == 0){
    throw new Exception('Le numéro de page est invalide.');
}

define('PER_PAGE', 8);

$data = new DataHelper;
$count = $data->countData('movie');
$pages = ceil($count / PER_PAGE);

if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}

$offset = PER_PAGE * ($currentPage - 1);

$movies = Movie::getAllMovies(PER_PAGE, $offset);
?>

<section class="section-gestion-news container align-self-start my-5">
    <div class="d-flex justify-content-between">
        <h1 class="mt-5 mb-3 text-uppercase text-dark font-weight-light">Gestion des films</h1>
        <a href="<?= $router->generate('addMovie') ?>" class="btn btn-dark font-weight-lighter mt-auto mt-5 mb-3 rounded-0 ">Ajouter un film</a>
    </div>
    
    <table class="table table-striped text-center" style="min-width: 50rem;">
    <thead>
        <tr>
            <th scope="col" class="text-left" style="width: 5%">ID</th>
            <th scope="col" class="text-left" style="width: 30%">Nom</th>
            <th scope="col" class="text-left" style="width: 10%">Créé le</th>
            <th scope="col" class="text-left" style="width: 10%">Emplacement</th>
            <th scope="col" style="width: 10%"></th>
            <th scope="col" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($movies as $movie) : ?>
        <tr>
            <th class="align-middle text-truncate text-left" scope="row"> <?= $movie->id ?> </th>
            <td class="align-middle text-truncate text-left"> <?= substr($movie->name, 0, 30) . '...' ?> </td>
            <td class="align-middle text-truncate text-left"> <?= $movie->getCreatedAt()->format('d F Y') ?> </td>
            <td class="align-middle text-truncate text-left"> <?= (int)$movie->place === 1 ? "Page d'accueil" : "null" ?> </td>
            <td class="align-middle"><a href="<?= $router->generate('updateMovie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-primary font-weight-lighter rounded-0 ">Modifier</a></td>
            <td class="align-middle"><a href="<?= $router->generate('deleteMovie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-danger font-weight-lighter rounded-0 ">Supprimer</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
        <div class="section-movies-buttonsPage d-flex justify-content-between my-5">
        <?php if ($currentPage > 1) : ?>
            <?php $link = $router->generate('movies_gestion');?>
            <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
            <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
        <?php endif ?>  
        <?php if ($currentPage < $pages) : ?>
            <a href="<?= $router->generate('movies_gestion') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
        <?php endif ?> 
    </div>
</section>