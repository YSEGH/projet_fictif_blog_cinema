<?php
use App\Classe\Post\Post;
session_start();

!empty($_POST['title']) ? $title = $_POST['title'] : $title = null;
!empty($_POST['title']) ? $slug = str_replace(' ', '-', $title) : $slug = null;
!empty($_POST['content']) ? $content = $_POST['content'] : $content = null;
!empty($_POST['author']) ? $author = $_POST['author'] : $author = null;
!empty($_POST['photo']) ? $photo = $_POST['photo'] : $photo = null;
isset($_POST['place']) ? $place = 1 : $place = 0;

$_POST ? Post::addPost($slug, $title, $content, $author, $photo, $place) : null;

?>

<section class="section-form container align-self-start mb-5 my-5">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center p-5">
        <h1 class="text-uppercase align-self-start text-dark font-weight-light"><?= $post->title ?></h1>
        <form action="" method="POST" class="d-flex flex-column border w-100 p-3">
            <div class="d-flex flex-wrap justify-content-around">
            <div class="form-group w-50 p-3 d-flex flex-column">
                <div class="mb-2">
                    <label for="title">Titre : </label>
                    <input class="form-control" type="text" name="title" value="">
                </div>
                <div class="">
                    <label for="author">Auteur : </label>
                    <input class="form-control" type="text" name="author" value="">
                </div>
            </div>
            <div class="form-group w-50 p-3">
                <label for="content">Article : </label>
                <textarea class="form-control" name="content" rows="10"></textarea>
            </div>

            <div class="form-group w-50 p-3">
                <label for="photo">Photo : </label>
                <input class="form-control my-2" type="text" value="">
                <input type="file" class="form-control-file" name="photo">
            </div> 
            <div class="form-check">
                <input class="form-check-input" name="place" type="checkbox" value="<?= $post->place ?>" id="defaultCheck1" >
                <label class="form-check-label" for="defaultCheck1">
                    Afficher cet article sur la page d'accueil
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