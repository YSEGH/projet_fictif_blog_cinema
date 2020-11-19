<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;

if ((int)$_GET['page'] === 1) {
    header('Location: ' . $router->generate('posts_page'));
}
$title = "Actualités";
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

<div class="row justify-content-center align-items-center mt-4" style="height: 11vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-calendar p-1" aria-hidden="true"></i> Actualités</h3>
</div>  

<div class="cards-actualite row d-flex flex-wrap justify-content-center">
    <?php foreach($posts as $post) : ?> 
        <a class="col-md-3 col-5 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
            <?php require dirname(__DIR__) .'/admin/homepage/post_card.php'?>
        </a>
    <?php endforeach ?>
</div>
<div class="section-movies-buttonsPage d-flex justify-content-between my-5 w-100">
    <?php if ($currentPage > 1) : ?>
        <?php $link = $router->generate('posts_page');?>
        <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
        <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
    <?php endif ?>  
    <?php if ($currentPage < $pages) : ?>
        <a href="<?= $router->generate('posts_page') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
    <?php endif ?> 
</div>