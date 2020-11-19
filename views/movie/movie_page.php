<?php
use App\Classe\Movie\Movie;
$movie = Movie::getMovie($params['slug'], $params['id']);
$title = $movie->name;
if($movie === false) {
    throw new Exception('Aucun article ne correspond à cet ID');
}
if($params['slug'] !== $movie->slug) {
    header('Location: ' . $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->id]));
}
?>

<div class="section-moviePage container d-flex flex-column align-items-center justify-content-center my-5 p-5">
    <h1 class="align-self-start"><?= $movie->name ?></h1>
    <div class="section-moviePage-content row d-flex my-2 w-100">
        <div class="section-moviePage-infos col-md-3 col-sm-12 p-2" style="height: auto;">
            <div class="section-moviePage-photo bg-dark" style="height: 10rem; background-image:url(<?= $movie->photo ?>)"></div>
            <div class="d-flex flex-column justify-content-center" style="height: 10rem;">
                <a href="#myModal" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto" data-toggle="modal">Bande annonce</a>
                <a href="#myModal<?=$movie->id?>" class="btn btn-dark font-weight-lighter rounded-0 mx-auto" data-toggle="modal" >Séances</a>
            </div>
        </div>
        <div class="section-moviePage-resume col-md-7 col-sm-12">
            <div class="d-flex justify-content-start" style="height: auto;">
                <ul class="d-flex p-0">
                    <?php $categories = Movie::recupCategories($movie->id) ?>
                    <?php foreach($categories as $category) : ?>
                        <li><a class="badge badge-primary font-weight-light rounded-0 mr-1" href=""><?= $category->name ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <h3>Synopsis :</h3>
            <p><?= $movie->resume ?></p>
        </div>
        <div class="section-moviePage-backLink col-md-2 col-sm-12 mt-auto d-flex justify-content-end">
            <a href="<?= $router->generate('movies_page')?>" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto">Retour</a>
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