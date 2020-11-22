<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;
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
$count = $data->countData('post');
$pages = ceil($count / PER_PAGE);

if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}

$offset = PER_PAGE * ($currentPage - 1);

$posts = Post::getAllPosts(PER_PAGE, $offset);
?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-between align-items-center p-5" style="min-height: auto;">
    <h3 class="col-md-8 col-12 mb-md-0 mb-3 text-white text-md-left text-center text-uppercase font-weight-light"><i class="fa fa-list" aria-hidden="true"></i> Liste des articles</h3>
    <a href="<?= $router->generate('add_post') ?>" class="col-md-2 col-12 btn btn-warning font-weight-lighter mt-auto rounded-0 ">Ajouter un article</a>
</div>
    
<table class="table table-striped m-auto px-5" style="width:80vw;">
    <thead>
        <tr>
            <th scope="col" class="col-auto text-left text-white">ID</th>
            <th scope="col" class="col-auto text-left text-white">Titre</th>
            <th scope="col" class="col-auto text-left text-white">Créé le</th>
            <th scope="col" class="col-auto text-left "></th>
            <th scope="col" class="col-auto text-left "></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post) : ?>
        <tr>
            <th class="col-auto align-middle text-truncate text-left text-white" scope="row"> <?= $post->id ?> </th>
            <td class="col-auto align-middle text-truncate text-left text-white"> <?= substr($post->title, 0, 60) . '...' ?> </td>
            <td class="col-auto align-middle text-truncate text-left text-white"> <?= $post->getCreatedAt()->format('d F Y') ?> </td>
            <td class="col-auto align-middle "><a href="<?= $router->generate('update_post', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-primary font-weight-lighter rounded-0 ">Modifier</a></td>
            <td class="col-auto align-middle "><a href="<?= $router->generate('delete_post', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-danger font-weight-lighter rounded-0 ">Supprimer</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="section-movies-buttonsPage d-flex justify-content-between my-5">
    <?php if ($currentPage > 1) : ?>
        <?php $link = $router->generate('posts_list');?>
        <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
        <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
    <?php endif ?>  
    <?php if ($currentPage < $pages) : ?>
        <a href="<?= $router->generate('posts_list') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
    <?php endif ?> 
</div>
