<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;

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
$count = $data->countData('post');
$pages = ceil($count / PER_PAGE);

if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}

$offset = PER_PAGE * ($currentPage - 1);

$posts = Post::getAllPosts(PER_PAGE, $offset);
?>

<section class="section-gestion-news container align-self-start my-5">
    <div class="d-flex justify-content-between">
        <h1 class="mt-5 mb-3 text-uppercase text-dark font-weight-light">Gestion des articles</h1>
        <a href="<?= $router->generate('addPost') ?>" class="btn btn-dark font-weight-lighter mt-auto mt-5 mb-3 rounded-0 ">Ajouter un article</a>
    </div>
    
    <table class="table table-striped text-center" style="min-width: 50rem;">
    <thead>
        <tr>
            <th scope="col" class="text-left" style="width: 5%">ID</th>
            <th scope="col" class="text-left" style="width: 35%">Titre</th>
            <th scope="col" class="text-left" style="width: 10%">Créé le</th>
            <th scope="col" class="text-left" style="width: 10%">Auteur</th>
            <th scope="col" class="text-left" style="width: 10%">Emplacement</th>
            <th scope="col" style="width: 10%"></th>
            <th scope="col" style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post) : ?>
        <tr>
            <th class="align-middle text-truncate text-left" scope="row"> <?= $post->id ?> </th>
            <td class="align-middle text-truncate text-left"> <?= substr($post->title, 0, 60) . '...' ?> </td>
            <td class="align-middle text-truncate text-left"> <?= $post->getCreatedAt()->format('d F Y') ?> </td>
            <td class="align-middle text-truncate text-left"> <?= $post->author ?> </td>
            <td class="align-middle text-truncate text-left"> <?= (int)$post->place === 1 ? "Page d'accueil" : "null" ?> </td>
            <td class="align-middle"><a href="<?= $router->generate('updatePost', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-primary font-weight-lighter rounded-0 ">Modifier</a></td>
            <td class="align-middle"><a href="<?= $router->generate('deletePost', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-danger font-weight-lighter rounded-0 ">Supprimer</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
        <div class="section-movies-buttonsPage d-flex justify-content-between my-5">
        <?php if ($currentPage > 1) : ?>
            <?php $link = $router->generate('posts_gestion');?>
            <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
            <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
        <?php endif ?>  
        <?php if ($currentPage < $pages) : ?>
            <a href="<?= $router->generate('posts_gestion') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
        <?php endif ?> 
    </div>
</section>