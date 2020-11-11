<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;

$data = new DataHelper;
$post = $data->recupRow('post', 'id', $params['id'], Post::class);
$title = $post->title;

if($post === false) {
    throw new Exception('Aucun article ne correspond à cet ID');
}
if($params['slug'] !== $post->slug) {
    header('Location: ' . $router->generate('newsPage', ['slug' => $post->slug, 'id' => $post->id]));
}
?>

<div class="section-newsPage container my-5">
    <h1><?= $post->title ?></h1>
    <div class="section-newsPage-container d-flex p-5">
        <div class="w-25" style="height: auto;">
            <div class="section-newsPage-photo bg-dark w-100" style="height: 10rem; background-image:url(<?= $post->photo ?>)"></div>
            <p class="mt-4">Par <?= $post->author ?></p>
            <p class="text-muted">Le <?= $post->getCreatedAt()->format('d F Y') ?></p>
        </div>
        <div class="section-newsPage-content w-50 ml-5 mt-5">
            <p><?= $post->content ?></p>
            <p><?= $post->content ?></p>
            <p><?= $post->content ?></p>     
        </div>
        <div class="section-newsPage-backLink  ml-5 mt-auto d-flex justify-content-end">
            <a href="<?= $router->generate('news')?>" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto">Retour</a>
        </div>
    </div>
</div>