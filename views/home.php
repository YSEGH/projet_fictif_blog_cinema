<?php
session_start();

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;
use App\Classe\Post\Post;

$title = "Accueil";
$data = new DataHelper;
$infos = $data->recupTable('infos', null, null, null)[0];
$posts_homepage = Post::getHomepagePosts();

$movie_1 = Movie::getMovieHomepage(1)[0];
$movie_2 = Movie::getMovieHomepage(2)[0];
$movie_3 = Movie::getMovieHomepage(3)[0];
$movie_4 = Movie::getMovieHomepage(4)[0];
?>

<div class="row align-items-center p-3 mb-5" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div id="carousel" class="carousel slide row  mt-5 mb-5 pt-5 " data-ride="carousel" style="height: auto;">
  <div class="carousel-inner col-md-10 col-12 mx-auto">
    <div class="carousel-item active">
        <div class="d-flex flex-column justify-content-end align-items-end p-3" style="background-image: url(http://localhost:8000/img/route.jpg); background-position:center; background-size:cover; height:60vh;">
          <div><h1 class="text-white font-weight-lighter text-uppercase p-3" style="background-color: RGBA(0, 0, 0, 0.85);"><span class="font-weight-light">1ère</span> édition <span class="font-weight-light">2020</span></h1></div>
          <a href="" class="btn btn-dark font-weight-lighter d-flex align-items-center rounded-0 border-0" style="background-color:#222121;">Voir le programme <i class="fa fa-angle-right fa-2x ml-2" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="carousel-item">
        <div class="d-flex flex-column justify-content-end align-items-end p-3" style="background-image: url(http://localhost:8000/img/droite.jpg); background-position:center; background-size:cover; height:60vh;">
          <div><h1 class="text-white font-weight-lighter p-3" style="background-color: RGBA(0, 0, 0, 0.85);"><span class="font-weight-light">Rencontre</span> avec Thierry Ladroite</h1></div>
          <a href="" class="btn btn-dark font-weight-lighter d-flex align-items-center rounded-0 border-0" style="background-color: #EF6962;">Lire la suite... <i class="fa fa-angle-right fa-2x ml-2" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="carousel-item">
        <div class="d-flex flex-column justify-content-end align-items-end p-3" style="background-image: url(http://localhost:8000/img/tomate.jpg); background-position:center; background-size:cover; height:60vh;">
          <div><h1 class="text-white font-weight-lighter p-3" style="background-color: RGBA(0, 0, 0, 0.85);"><span class="font-weight-light">Tomates</span> de Maxime Dupont</h1></div>
          <a href="" class="btn btn-dark font-weight-lighter d-flex align-items-center rounded-0 border-0" style="background-color: #222121;">Lire la fiche <i class="fa fa-angle-right fa-2x ml-2" aria-hidden="true"></i></a>
        </div>    </div>
  </div>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-3" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class=" fa fa-newspaper-o p-1" aria-hidden="true"></i> Actualités</h3>
</div>
<div class="row d-flex justify-content-center mb-5 px-3">
  <?php foreach($posts_homepage as $post) : ?>
    <a href="<?= $router->generate('post_page', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="col-md-3 col-12 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
        <?php require 'admin/homepage/post_card.php'?>
    </a>
  <?php endforeach ?>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-3" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-calendar p-1" aria-hidden="true"></i> Programme</h3>
</div>  
<div class="row d-flex justify-content-center mb-5 px-3">
  <?php for ($i=12; $i < 17; $i++) : ?>
    <a href="<?= $router->generate('programme', ['slug' => 20201012 + ($i - 12) ]) ?>" class="col-md-2 col-5 link-homepage-program my-2 mx-2 d-flex justify-content-center align-items-center" style="max-height:10rem; min-height:10rem;max-width:10rem; min-width:10rem;">
      <h3><?= $i ?> - Oct</h3>
    </a>
  <?php endfor ?>
</div>

<div class="row justify-content-center align-items-center mt-5 mb-3" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> Films à l'affiche</h3>
</div>  
<div class="photo-festival row d-flex justify-content-center mb-5" style="min-height:80vh;">
    <div class="col-md-3 col-12 mb-1 p-0" style="overflow:hidden;">
      <a href="<?= $router->generate('movie_page', ['slug' => $movie_1->slug, 'id' => $movie_1->id]) ?>" class="col-md-3 col-12 p-3 photo-1 bg-primary d-flex justify-content-start align-items-end h-100" style="max-width: 440px; background-image:url('<?= $movie_1->photo ?>');"><h5 class="col-auto py-2 text-white text-center font-weight-light" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_1->name ?> <br> <span class="font-weight-lighter">- <br> <?= $movie_1->realisator ?></span></h5></a>
    </div>
    <div class="col-md-4 col-12 d-flex flex-column justify-content-between align-items-center">    
        <a href="<?= $router->generate('movie_page', ['slug' => $movie_2->slug, 'id' => $movie_2->id]) ?>" class="p-3 mb-1 h-50 w-100 photo-2 bg-warning d-flex justify-content-start align-items-start" style="background-image:url('<?= $movie_2->photo ?>');"><h5 class="col-auto py-2 text-white text-center font-weight-light" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_2->name ?> <br> <span class="font-weight-lighter">- <br> <?= $movie_2->realisator ?></span></h5></a>
        <a href="<?= $router->generate('movie_page', ['slug' => $movie_3->slug, 'id' => $movie_3->id]) ?>" class="p-3 mb-1 h-50 w-100 photo-3 bg-danger d-flex justify-content-end align-items-end" style="background-image:url('<?= $movie_3->photo ?>');"><h5 class="col-auto py-2 text-white text-center font-weight-light" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_3->name ?> <br>  <span class="font-weight-lighter">-  <br> <?= $movie_3->realisator ?></span></h5></a>
    </div>
    <div class="col-md-3 col-12 mb-1 p-0" style="overflow:hidden;">
      <a href="<?= $router->generate('movie_page', ['slug' => $movie_4->slug, 'id' => $movie_4->id]) ?>" class="p-3 col-md-3 col-12 photo-4 bg-success d-flex justify-content-end align-items-start h-100" style="max-width: 440px; background-image:url('<?= $movie_4->photo ?>');"><h5 class="col-auto py-2 text-white text-center font-weight-light" style="background-color: RGBA(0, 0, 0, 0.85);"> <?= $movie_4->name ?> <br> <span class="font-weight-lighter">-  <br> <?= $movie_4->realisator ?></span></h5></a>
    </div>
</div>

<div class="row justify-content-center align-items-center mt-5 p-3" >
  <h1 class="col-md-8 col-12 mt-5 mb-3 align-self-start text-uppercase text-center text-white font-weight-light">INSCRIVEZ-VOUS À LA NEWSLETTER POUR NE RIEN RATER DU FESTIVAL ET DES INFOS EN EXCLUSIVITÉ !</h1>
</div>
<div class="row justify-content-center align-items-center px-5">
    <h5 class="text-white text-center font-weight-light">Pour vous inscrire à notre newsletter, merci de saisir votre addresse email dans le champ situé ci-dessous.</h5>
</div>
<div class="row d-flex justify-content-center">
    <form action="" method="POST" class="col-md-8 col-10 mt-3 mx-5 pt-3">
        <div class="row form-group my-3 mx-auto d-flex justify-content-between">
            <input type="email" class="col-md-5 my-3 col-12 newsletter-name form-control shadow-none rounded-0 border-top-0 border-left-0 border-right-0" placeholder="Nom" style="background-color: #131313;" name="name">
            <input type="email" class="col-md-5 my-3 col-12 newsletter-firstname form-control shadow-none rounded-0 border-top-0 border-left-0 border-right-0" placeholder="Prénom" style="background-color: #131313;" name="firstname">
        </div>
        <div class="form-group my-3 mx-auto ">
            <input type="email" class="newsletter-email form-control shadow-none rounded-0 border-top-0 border-left-0 border-right-0" placeholder="monadresseemail@exemple.com" style="background-color: #131313;" name="email">
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 m-auto" style="background-color: #EF6962;">Je m'inscris</button>    
        </div>
    </form>
</div>

<div class="row d-flex justify-content-center align-items-center mt-5" style="height: 30vh;">
  <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a>
  <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-facebook-official fa-4x" aria-hidden="true"></i></a>
  <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
</div>


