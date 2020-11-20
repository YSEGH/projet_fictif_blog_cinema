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
<div class="row align-items-center p-3 mb-5" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row d-flex justify-content-center my-2 p-5">
    <div class="movie_page-infos col-md-3 col-sm-12 p-2" style="height: auto;">
        <div class="movie_page-photo bg-dark" style="height: 10rem; background-image:url(<?= $movie->photo ?>)"></div>
        <div class="d-flex flex-column justify-content-center" style="height: 10rem;">
            <a href="#myModal" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto" data-toggle="modal">Bande annonce</a>
            <a href="#myModal<?=$movie->id?>" class="btn btn-dark font-weight-lighter rounded-0 mx-auto" data-toggle="modal" >Séances</a>
        </div>
    </div>
    <div class="movie_page-resume col-md-4 col-sm-12 p-3">
        <h2 class="text-white text-md-left text-center font-weight-light "><?= $movie->name ?></h2>
        <div class="d-flex justify-content-md-start justify-content-center" style="height: auto;">
            <ul class="d-flex p-0">
                <?php $categories = Movie::recupCategories($movie->id) ?>
                <?php foreach($categories as $category) : ?>
                    <li><a class="badge badge-warning text-white font-weight-light rounded-0 mr-1" href=""><?= $category->name ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
        <h4 class="text-white font-weight-light ">Synopsis :</h4>
        <p class="text-white font-weight-lighter "><?= $movie->resume ?></p>
    </div>
    <div class="section-moviePage-backLink col-12 d-flex justify-content-end my-3">
        <a href="<?= $router->generate('movies_page')?>" class="btn btn-dark font-weight-lighter rounded-0 my-2 mx-auto" style="background-color: #EF6962;">Retour</a>
    </div>
</div>

<?php require '../views/movie/seanceModal.php' ?>
<div class="bs-example"> 
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe id="cartoonVideo" width="560" height="315" src="https://www.youtube.com/embed/XqZsoesa55w" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>      