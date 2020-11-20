<?php
use App\Classe\Post\Post;
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}

!empty($_POST['title']) ? $title = $_POST['title'] : $title = null;
!empty($_POST['title']) ? $slug = str_replace(' ', '-', $title) : $slug = null;
!empty($_POST['content']) ? $content = $_POST['content'] : $content = null;
!empty($_POST['author']) ? $author = $_POST['author'] : $author = null;
!empty($_POST['photo']) ? $photo = $_POST['photo'] : $photo = null;
isset($_POST['place']) ? $place = 1 : $place = 0;

$_POST ? Post::addPost($slug, $title, $content, $author, $photo, $place) : null;

?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un article</h3>
</div>

<div class="d-flex justify-content-center">
    <form action="" method="POST" class="d-flex flex-wrap align-items-center justify-content-center">
        <div class="d-flex flex-column flex-wrap justify-content-around">
            <div class="form-group row d-flex">
                <div class="col-md-6 col-12 mb-2">
                    <label class="text-white" for="title">Titre : </label>
                    <input class="form-control rounded-0" type="text" name="title" value="">         
                </div>
                <div class="col-md-6 col-12 ">
                    <label class="text-white" for="author">Auteur : </label>
                    <input class="form-control rounded-0" type="text" name="author" value="">
                </div>
            </div>
            <div class="form-group row d-flex">
                <div class="col-md-6 col-12 ">
                    <label class="text-white" for="content">Article : </label>
                    <textarea class="form-control rounded-0" name="content" rows="8"></textarea>
                </div>
                <div class="col-md-6 col-12">
                    <label class="text-white" for="photo">Photo : </label>
                    <input class="form-control rounded-0 my-2" type="text" value="">
                    <input class="text-white" type="file" class="form-control-file" name="photo">
                </div>
            </div>
        </div>   
        <div class="col-12 d-flex justify-content-center m-3">
            <a href="<?= $_SESSION['LAST_URI'] ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" ><?php if (!empty($_POST)) : ?>Retour<?php else : ?>Annuler<?php endif ?></a>
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Mettre à jour</button>    
        </div>
    </form>
</div>
