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
    header('Location: ' . $router->generate('post_page', ['slug' => $post->slug, 'id' => $post->id]));
}
?>
<div class="row align-items-center p-3 mb-5" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>



<div class="row justify-content-center px-3">
    <div class="post_page-infos col-md-3 col-12 p-2" style="height: auto;">
        <div class="post_page-photo bg-dark" style="height: 10rem; background-image:url(<?= $post->photo ?>)"></div>
        <p class="text-md-left text-center mt-4 text-white">Par <?= $post->author ?></p>
        <p class="text-md-left text-center text-dark">Le <?= $post->getCreatedAt()->format('d F Y') ?></p>
    </div>
    <div class="post_page-content text-white col-md-4 col-12 p-3">
        <h5 class="mt-3 mb-4 text-center text-uppercase"><?= $post->title ?></h5>
        <p class="text-justify"><?= $post->content ?></p>
        <p class="text-justify"><?= $post->content ?></p>
        <p class="text-justify"><?= $post->content ?></p>     
    </div>
    <div class="post_page-back_link col-12 my-4 d-flex justify-content-end">
        <a href="<?= $router->generate('posts_page')?>" class="btn btn-dark font-weight-lighter rounded-0 mx-auto" style="background-color: #EF6962;">Retour</a>
    </div>
</div>
