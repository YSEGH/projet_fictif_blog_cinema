<?php
use App\Classe\Movie\Movie;
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}

$slug = $params['slug'];
$id = $params['id'];

!empty($_POST['name']) ? $name = $_POST['name'] : $name = null;
!empty($_POST['release_date']) ? $release_date = $_POST['release_date'] : $release_date = null;
!empty($_POST['resume']) ? $resume = $_POST['resume'] : $resume = null;
!empty($_POST['realisator']) ? $realisator = $_POST['realisator'] : $realisator = null;
!empty($_POST['actor']) ? $actor = $_POST['actor'] : $actor = null;
!empty($_POST['photo']) ? $photo = $_POST['photo'] : $photo = null;

$_POST ? Movie::updateMovie($slug, $id, $name, $release_date, $resume, $realisator, $actor, $photo) : null;
$movie = Movie::getMovie($params['slug'], $params['id']);
$categories = $movie->recupCategories($movie->id);
?>

<section class="section-form container">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center my-4">
        <h1 class="text-uppercase align-self-start text-dark font-weight-light">Modifier - <?= $movie->name ?></h1>
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
                    <textarea class="form-control" name="resume" rows="8"><?= $movie->resume ?></textarea>
                </div>
                <div class="form-group w-50 p-3">
                    <label for="photo">Photo : </label>
                    <div class="" style="background-image: url(<?= $movie->photo ?>); background-position:center; background-size: cover; height:7rem; width:7rem"></div>
                    <input class="form-control my-2" type="text" value="<?= $movie->photo ?>">
                    <input type="file" class="form-control-file" name="photo">
                </div> 
            </div>   
            <div class="d-flex w-10 flex-column align-self-start p-3">
                <div>
                <?php foreach($categories as $category) : ?>
                    <span type="text" class="badge badge-primary font-weight-light rounded-0 mr-1 m-auto"><?= $category->name ?></span>
                <?php endforeach ?>     
                </div>
                <a href="<?= $router->generate('update_category', ['slug' => $movie->slug, 'id' => $movie->id])?>" class="btn btn-light border font-weight-lighter rounded-0 mt-3 mx-1" >Catégories</a>
            </div>    
            <div class="d-flex justify-content-center m-3">
                <a href="<?= $_SESSION['LAST_URI'] ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" ><?php if (!empty($_POST)) : ?>Retour<?php else : ?>Annuler<?php endif ?></a>
                <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Mettre à jour</button>    
            </div>
        </form>
    </div>

</section>