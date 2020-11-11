<?php

use App\Classe\Data\DataHelper;
use App\Classe\Post\Post;

$title = "Actualités";
define('PER_PAGE', 6);
$data = new DataHelper;
$posts = $data->recupTable('post', PER_PAGE, null, Post::class);

?>

<section class="section-news-news container my-5">
    <h1 class="mt-5 mb-3">Actualités</h1>
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
</section>