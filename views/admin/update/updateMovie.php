<?php
use App\Classe\Movie\Movie;
session_start();

$slug = $params['slug'];
$id = $params['id'];

!empty($_POST['name']) ? $name = $_POST['name'] : $name = null;
!empty($_POST['release_date']) ? $release_date = $_POST['release_date'] : $release_date = null;
!empty($_POST['resume']) ? $resume = $_POST['resume'] : $resume = null;
!empty($_POST['realisator']) ? $realisator = $_POST['realisator'] : $realisator = null;
!empty($_POST['actor']) ? $actor = $_POST['actor'] : $actor = null;
!empty($_POST['photo']) ? $photo = $_POST['photo'] : $photo = null;
isset($_POST['place']) ? $place = 1 : $place = 0; 

$_POST ? Movie::updateMovie($slug, $id, $name, $release_date, $resume, $realisator, $actor, $photo, $place) : null;
$movie = Movie::getMovie($params['slug'], $params['id']);
?>

<section class="section-form container align-self-start mb-5 my-5">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center p-5">
        <h1 class="text-uppercase align-self-start text-dark font-weight-light"><?= $movie->name ?></h1>
        <form action="" method="POST" class="d-flex flex-column border w-100 p-3">
            <div class="d-flex flex-wrap justify-content-around">
            <div class="form-group w-50 p-3 d-flex flex-column">
                <div class="mb-2">
                    <label for="name">Nom : </label>
                    <input class="form-control" type="text" name="name" value="<?= $movie->name ?>">
                </div>
                <div>
                    <label for="release_date">Date de sortie : </label>
                    <input class="form-control" type="date" name="release_date" placeholder="AAAA-MM-JJ" value="<?= $movie->release_date ?>">
                </div>
            </div>
            <div class="form-group w-50 p-3 d-flex flex-column">
                <div class="mb-2">
                    <label for="realisator">Réalisateur : </label>
                    <input class="form-control" type="text" name="realisator" value="<?= $movie->realisator ?>">
                </div>
                <div>
                    <label for="actor">Acteur(s) : </label>
                    <input class="form-control" type="text" name="actor" value="<?= $movie->actor ?>">
                </div>
            </div>
            <div class="form-group w-50 p-3">
                <label for="resume">Synopsis : </label>
                <textarea class="form-control" name="resume" rows="10"><?= $movie->resume ?></textarea>
            </div>

            <div class="form-group w-50 p-3">
                <label for="photo">Photo : </label>
                <div class="" style="background-image: url(<?= $movie->photo ?>); background-position:center; background-size: cover; height:10rem; width:10rem"></div>
                <input class="form-control my-2" type="text" value="<?= $movie->photo ?>">
                <input type="file" class="form-control-file" name="photo">
            </div> 
            <div class="form-check">
                <input class="form-check-input" name="place" type="checkbox" value="<?= $movie->place ?>" id="defaultCheck1" <?php if($movie->place == 1) : ?> checked <?php endif ?>>
                <label class="form-check-label" for="defaultCheck1">
                    Afficher ce film sur la page d'accueil
                </label>
            </div>
            </div>       
            <div class="d-flex justify-content-center m-3">
                <a href="<?= $_SESSION['LAST_URI'] ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" ><?php if (!empty($_POST)) : ?>Retour<?php else : ?>Annuler<?php endif ?></a>
                <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Mettre à jour</button>    
            </div>
        </form>
    </div>

</section>