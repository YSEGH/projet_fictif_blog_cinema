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
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-address-book" aria-hidden="true"></i> Modifier - <?= $movie->name ?></h3>
</div>

<div class="d-flex justify-content-center" >
    <form action="" method="POST" class="d-flex flex-wrap align-items-center justify-content-center mb-5">
        <div class="d-flex flex-column flex-wrap justify-content-around p-3">
            <div class="form-group row d-flex">
                <div class="col-md-6 col-12 mb-2">
                    <label class="text-white" for="name">Nom : </label>
                    <input class="form-control rounded-0" type="text" name="name" value="<?= $movie->name ?>">
                </div>
                <div class="col-md-6 col-12 ">
                    <label class="text-white" for="release_date">Date de sortie : </label>
                    <input class="form-control rounded-0" type="date" name="release_date" placeholder="AAAA-MM-JJ" value="<?= $movie->release_date ?>">
                </div>
            </div>
            <div class="form-group row d-flex">
                <div class="col-md-6 col-12 ">
                    <label class="text-white" for="realisator">Réalisateur : </label>
                    <input class="form-control rounded-0" type="text" name="realisator" value="<?= $movie->realisator ?>">
                </div>
                <div class="col-md-6 col-12">
                    <label class="text-white" for="actor">Acteur(s) : </label>
                    <input class="form-control rounded-0" type="text" name="actor" value="<?= $movie->actor ?>">
                </div>
            </div>
            <div class="form-group row d-flex">
                <div class="col-md-6 col-12">
                    <label class="text-white" for="resume">Synopsis : </label>
                    <textarea class="form-control rounded-0" name="resume" rows="8"><?= $movie->resume ?></textarea>
                </div>
                <div class="col-md-6 col-12">
                    <label class="text-white" for="photo">Photo : </label>
                    <div class="" style="background-image: url(<?= $movie->photo ?>); background-position:center; background-size: cover; height:7rem; width:7rem"></div>
                    <input class="form-control rounded-0 my-2" type="text" value="<?= $movie->photo ?>">
                    <input type="file" class="form-control-file text-white" name="photo">                
                </div>
            </div>
            <div class="row d-flex justify-content-between align-items-center p-3">
                <div>
                    <div>
                        <?php foreach($categories as $category) : ?>
                            <span type="text" class="badge badge-warning text-white font-weight-light rounded-0 mr-1 m-auto"><?= $category->name ?></span>
                        <?php endforeach ?>     
                    </div>
                    <a href="<?= $router->generate('update_category', ['slug' => $movie->slug, 'id' => $movie->id])?>" class="btn btn-light border font-weight-lighter rounded-0 mt-3 mx-1" >Catégories</a>
                </div> 
                <div>
                    <a href="<?= $router->generate('update_program', ['slug' => $movie->slug, 'id' => $movie->id])?>" class="btn btn-light border font-weight-lighter rounded-0 mt-3 mx-1" >Séances</a>
                </div>   
            </div> 
        </div>   
        <div class="col-12 d-flex justify-content-center m-3">
            <a href="<?= $_SESSION['LAST_URI'] ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" ><?php if (!empty($_POST)) : ?>Retour<?php else : ?>Annuler<?php endif ?></a>
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Mettre à jour</button>    
        </div>
    </form>
</div>