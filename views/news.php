<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;

if ((int)$_GET['page'] === 1) {
    header('Location: ' . $router->generate('news'));
}

$currentPage = (int)($_GET['page'] ?? 1) ?: 1;
if($currentPage == 0){
    throw new Exception('Le numéro de page est invalide.');
}

$title = "Actualités";
define('PER_PAGE', 6);
$data = new DataHelper;
$count = $data->countData('post');
$pages = ceil($count / PER_PAGE);

if($currentPage > $pages){
    throw new Exception('Cette page n\'existe pas.');
}

$offset = PER_PAGE * ($currentPage - 1);

/* $posts = $data->recupTable('post', PER_PAGE, $offset, Post::class); */

$posts = Post::getAllPosts(PER_PAGE, $offset);

?>

<section class="section-news-news container d-flex flex-column align-items-center justify-content-center my-5">
    <h1 class="mt-5 mb-3 align-self-start text-uppercase text-dark font-weight-normal">Actualités</h1>
    <div class="cards-actualite d-flex flex-wrap justify-content-around p-3">
        <?php foreach($posts as $post) : ?> 
        <div class="card-actualite w-25 mx-1 border-0">
            <div class="card-header-actualite w-100 rounded-0" style="background-image: url(<?= $post->photo ?>);"></div>
            <div class="card-body my-1 p-3">
                <a class="text-uppercase font-weight-normal text-dark" href="<?= $router->generate('newsPage', ['slug' => $post->slug, 'id' => $post->id]) ?>"><?= $post->title ?></a> <!-- <span class="font-weight-lighter">text</span> -->
                <p class="text-justify font-weight-light text-dark"><?= substr($post->content, 0, 60) ?></p>
                <p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y') ?></p>
                <a href="<?= $router->generate('newsPage', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="btn btn-dark rounded-0 mt-1 mb-4 ml-auto font-weight-lighter">En savoir plus</a>
            </div>
        </div>
        <?php endforeach ?> 
    </div>
    <div class="section-movies-buttonsPage d-flex justify-content-between my-5 w-100">
        <?php if ($currentPage > 1) : ?>
            <?php $link = $router->generate('news');?>
            <?php if ($currentPage > 2) $link .= '?page=' . ($currentPage - 1); ?>
            <a href="<?= $link ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1" >Page précédente</a>
        <?php endif ?>  
        <?php if ($currentPage < $pages) : ?>
            <a href="<?= $router->generate('news') ?>?page=<?= $currentPage + 1 ?>" class="btn btn-dark font-weight-lighter rounded-0 m-1 ml-auto" >Page suivante</a>
        <?php endif ?> 
    </div>
</section>