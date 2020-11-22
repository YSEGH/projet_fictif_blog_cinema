<?php
use App\Classe\Movie\Movie;
?>

<div class="movies_page-item-photo m-0 p-0 rounded-0 col-md-4" style="background-image: url(<?= $movie->photo ?>);"></div>
<div class="movies_page-item-body card-body col-md-6 m-0 text-center d-flex flex-column align-items-start justify-content-center">
    <h6 class="text-uppercase font-weight-normal mx-auto text-white my-2"><?= $movie->name ?></h6>
    <?php $categories = Movie::recupCategories($movie->id) ?>
    <div class="d-flex flex-wrap my-2">
        <?php foreach($categories as $category) : ?>
            <span type="text" class="badge badge-warning text-white font-weight-light rounded-0 my-1 mr-1" style="background-color: #EF6962;"><?= $category->name ?></span>
        <?php endforeach ?>
    </div>
    <p class="card-post-content text-justify text-white my-2"><?= substr($movie->resume, 0, 300) ?></p>
    <p class="card-post-content text-justify text-left text-white my-1"><span class="font-weight-normal">Réalisateur : </span><?= $movie->realisator ?></p>
    <p class="card-post-content text-justify text-left text-white my-1"><span class="font-weight-normal">Acteurs : </span><?= $movie->actor ?></p>
    <p class="card-post-content text-justify text-left text-white my-1"><span class="font-weight-normal">Date de sortie : </span><?= $movie->release_date ?></p>
</div>
