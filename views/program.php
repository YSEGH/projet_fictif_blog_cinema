<?php

use App\Classe\Program\Program;

$seances = Program::recupProgram($params['slug']);
//dd($seances);
foreach ($seances as $key => $seance) {
    $movies[$key] = $seance->recupFilmsByProgram();
    //dd($movies[$key]);
}
?>


<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-4" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> Programme du <?= $seances[0]->getProgram()->format('d F Y') ?></h3>
</div>  

<div class="row justify-content-center align-items-center mt-5 border-top border-bottom border-white mx-5" style="height: 8vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> 12H</h3>
</div>  

<div class="row justify-content-center align-items-center mt-4 mb-5 px-4">
<?php foreach ($movies[0] as $movie) : ?>
    <div class="col-md-2 col-6 d-flex flex-column align-items-center justify-content-center">
        <a class="seances_movie-link col-12 m-1" href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->movie_id]) ?>">
            <div class="seances_movie col-12 d-flex justify-content-end align-items-end p-0" style="background-image:url('<?= $movie->photo ?>');">
                <h5 class="col-8 text-white text-center font-weight-normal m-0" style="background-color: black"><?= $movie->name ?></h5>
            </div>
        </a>
        <a href="#reservationModal<?=$movie->movie_id?>" data-toggle="modal" class="btn btn-dark my-2 font-weight-lighter rounded-0 mx-auto" style="background-color: #EF6962;"><i class="fa fa-ticket" aria-hidden="true"></i></a>
        <?php require '../views/movie/seanceModal.php' ?>
    </div>
<?php endforeach ?>
</div>

<div class="row justify-content-center align-items-center mt-5 border-top border-bottom border-white mx-5" style="height: 8vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> 14H</h3>
</div>  

<div class="row justify-content-center align-items-center mt-4 mb-5 px-4">
<?php foreach ($movies[1] as $movie) : ?>
    <div class="col-md-2 col-6 d-flex flex-column align-items-center justify-content-center">
        <a class="seances_movie-link col-12 m-1" href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->movie_id]) ?>">
            <div class="seances_movie col-12 d-flex justify-content-end align-items-end p-0" style="background-image:url('<?= $movie->photo ?>');">
                <h5 class="col-8 text-white text-center font-weight-normal m-0" style="background-color: black"><?= $movie->name ?></h5>
            </div>
        </a>
        <a href="#reservationModal<?=$movie->movie_id?>" data-toggle="modal" class="btn btn-dark my-2 font-weight-lighter rounded-0 mx-auto" style="background-color: #EF6962;"><i class="fa fa-ticket" aria-hidden="true"></i></a>
        <?php require '../views/movie/seanceModal.php' ?>
    </div>
<?php endforeach ?>
</div>

<div class="row justify-content-center align-items-center mt-5 border-top border-bottom border-white mx-5" style="height: 8vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> 16H</h3>
</div>  

<div class="row justify-content-center align-items-center mt-4 mb-5 px-4">
<?php foreach ($movies[2] as $movie) : ?>
    <div class="col-md-2 col-6 d-flex flex-column align-items-center justify-content-center">
        <a class="seances_movie-link col-12 m-1" href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->movie_id]) ?>">
            <div class="seances_movie col-12 d-flex justify-content-end align-items-end p-0" style="background-image:url('<?= $movie->photo ?>');">
                <h5 class="col-8 text-white text-center font-weight-normal m-0" style="background-color: black"><?= $movie->name ?></h5>
            </div>
        </a>
        <a href="#reservationModal<?=$movie->movie_id?>" data-toggle="modal" class="btn btn-dark my-2 font-weight-lighter rounded-0 mx-auto" style="background-color: #EF6962;"><i class="fa fa-ticket" aria-hidden="true"></i></a>
        <?php require '../views/movie/seanceModal.php' ?>
    </div>
<?php endforeach ?>
</div>

<div class="row justify-content-center align-items-center mt-5 border-top border-bottom border-white mx-5" style="height: 8vh;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> 18H</h3>
</div>  

<div class="row justify-content-center align-items-center mt-4 mb-5 px-4">
<?php foreach ($movies[3] as $movie) : ?>
    <div class="col-md-2 col-6 d-flex flex-column align-items-center justify-content-center">
        <a class="seances_movie-link col-12 m-1" href="<?= $router->generate('movie_page', ['slug' => $movie->slug, 'id' => $movie->movie_id]) ?>">
            <div class="seances_movie col-12 d-flex justify-content-end align-items-end p-0" style="background-image:url('<?= $movie->photo ?>');">
                <h5 class="col-8 text-white text-center font-weight-normal m-0" style="background-color: black"><?= $movie->name ?></h5>
            </div>
        </a>
        <a href="#reservationModal<?=$movie->movie_id?>" data-toggle="modal" class="btn btn-dark my-2 font-weight-lighter rounded-0 mx-auto" style="background-color: #EF6962;"><i class="fa fa-ticket" aria-hidden="true"></i></a>
        <?php require '../views/movie/seanceModal.php' ?>
    </div>
<?php endforeach ?>
</div>

