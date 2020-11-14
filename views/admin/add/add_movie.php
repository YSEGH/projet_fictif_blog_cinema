<?php
use App\Classe\Movie\Movie;
session_start();

!empty($_POST['name']) ? $name = $_POST['name'] : $name = null;
!empty($_POST['name']) ? $slug = str_replace(' ', '-', $name) : $slug = null;
!empty($_POST['release_date']) ? $release_date = $_POST['release_date'] : $release_date = null;
!empty($_POST['resume']) ? $resume = $_POST['resume'] : $resume = null;
!empty($_POST['realisator']) ? $realisator = $_POST['realisator'] : $realisator = null;
!empty($_POST['actor']) ? $actor = $_POST['actor'] : $actor = null;
!empty($_POST['photo']) ? $photo = $_POST['photo'] : $photo = null;
isset($_POST['place']) ? $place = 1 : $place = 0; 

$_POST ? Movie::addMovie($slug, $name, $release_date, $resume, $realisator, $actor, $photo, $place) : null;

?>

<section class="section-form container">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center my-4">
        <h1 class="text-uppercase align-self-start text-dark font-weight-light">Ajouter un film</h1>
        <form action="" method="POST" class="d-flex flex-column border w-100 p-3">
            <div class="d-flex flex-wrap justify-content-around">
            <div class="form-group w-50 p-3 d-flex flex-column">
                <div class="mb-2">
                    <label for="name">Nom : </label>
                    <input class="form-control" type="text" name="name" value="">
                </div>
                <div>
                    <label for="release_date">Date de sortie : </label>
                    <input class="form-control" type="text" name="release_date" value="" placeholder="AAAA-MM-JJ">
                </div>
            </div>
            <div class="form-group w-50 p-3 d-flex flex-column">
                <div class="mb-2">
                    <label for="realisator">Réalisateur : </label>
                    <input class="form-control" type="text" name="realisator" value="">
                </div>
                <div>
                    <label for="actor">Acteur : </label>
                    <input class="form-control" type="text" name="actor" value="">
                </div>
            </div>
            <div class="form-group w-50 p-3">
                <label for="resume">Synopsis : </label>
                <textarea class="form-control" name="resume" rows="8"></textarea>
            </div>

            <div class="form-group w-50 p-3">
                <label for="photo">Photo : </label>
                <input class="form-control my-2" type="text" value="">
                <input type="file" class="form-control-file" name="photo">
            </div> 
            <div class="form-check">
                <input class="form-check-input" name="place" type="checkbox" value="" id="defaultCheck1" >
                <label class="form-check-label" for="defaultCheck1">
                    Afficher ce film sur la page d'accueil
                </label>
            </div>
            </div>       
            <div class="d-flex justify-content-center m-3">
                <a href="<?= $_SESSION['LAST_URI'] ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" ><?php if (!empty($_POST)) : ?>Retour<?php else : ?>Annuler<?php endif ?></a>
                <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Ajouter</button>    
            </div>
        </form>
    </div>

</section>