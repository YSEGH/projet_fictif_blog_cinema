<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

$data = new DataHelper;
$movie = $data->recupRow('movie', 'id', $params['id'], Movie::class);
$title = $movie->name;

if($movie === false) {
    throw new Exception('Aucun article ne correspond à cet ID');
}
if($params['slug'] !== $movie->slug) {
    header('Location: ' . $router->generate('moviePage', ['slug' => $movie->slug, 'id' => $movie->id]));
}

?>

<div class="section-moviePage container my-5">
    <h1 class=""><?= $movie->name ?></h1>
    <div class="section-moviePage-content d-flex p-5">
        <div class="section-moviePage-infos w-25 p-2" style="height: auto;">
            <div class="section-moviePage-photo bg-dark w-100" style="height: 10rem; background-image:url(<?= $movie->photo ?>)"></div>
            <div class="d-flex flex-column w-100 justify-content-center" style="height: 10rem;">
                <a href="#myModal" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto" data-toggle="modal">Bande annonce</a>
                <a href="#myModal<?=$movie->id?>" class="btn btn-dark font-weight-lighter rounded-0 mx-auto" data-toggle="modal" >Séances</a>
            </div>
        </div>
        <div class="section-moviePage-resume w-50 ml-5 mt-5">
            <div class="d-flex justify-content-start w-100" style="height: auto;">
                <ul class="d-flex p-0">
                    <?php $categories = $data->many("SELECT * 
                                                     FROM movie_has_moviecategory 
                                                     JOIN moviecategory ON movie_has_moviecategory.moviecategory_id = moviecategory.id
                                                     WHERE movie_has_moviecategory.movie_id = $movie->id") ?>
                    <?php foreach($categories as $category) : ?>
                        <li><a class="badge badge-primary font-weight-light rounded-0 mr-1" href=""><?= $category->name ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <h3>Synopsis :</h3>
            <p><?= $movie->resume ?></p>
        </div>
        <div class="section-moviePage-backLink  ml-5 mt-auto d-flex justify-content-end">
            <a href="<?= $router->generate('movies')?>" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto">Retour</a>
        </div>
    </div>
</div>
<?php require '../views/movie/seanceModal.php' ?>
<div class="bs-example"> 
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                  <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="cartoonVideo" width="560" height="315" src="https://www.youtube.com/embed/XqZsoesa55w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  </div>
                </div>
            </div>
        </div>
    </div>
</div>      