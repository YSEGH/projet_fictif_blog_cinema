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

<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div id="carousel" class=" carousel slide mt-3 pt-5 mx-auto" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="http://localhost:8000/img/banniere/route1000*400.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="http://localhost:8000/img/banniere/jardin1000*400.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="http://localhost:8000/img/banniere/seule1000*400.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class=" fa fa-newspaper-o p-1" aria-hidden="true"></i> Actualités</h3>
</div>
<div class="row d-flex justify-content-center">
  <?php foreach($posts_homepage as $post) : ?>
    <a href="<?= $router->generate('post_page', ['slug' => $post->slug, 'id' => $post->id]) ?>" class="col-md-3 col-5 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
        <?php require 'admin/homepage/post_card.php'?>
    </a>
  <?php endforeach ?>
</div>

<div class="row justify-content-center align-items-center mt-4" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-calendar p-1" aria-hidden="true"></i> Programme</h3>
</div>  
<div class="row d-flex justify-content-center">
  <?php for ($i=12; $i < 17; $i++) : ?>
    <a href="<?= $router->generate('programme', ['slug' => 20201012 + ($i - 12) ]) ?>" class="col-md-2 col-sm-3 col-5 link-homepage-program my-2 mx-2 d-flex justify-content-center align-items-center" style="max-height:10rem; min-height:10rem;max-width:10rem; min-width:10rem;">
      <h3><?= $i ?> - Oct</h3>
    </a>
  <?php endfor ?>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-film p-1" aria-hidden="true"></i> Films à l'affiche</h3>
</div>  
<div class="photo-festival row d-flex justify-content-center m-0" style="min-height:80vh;">
    <a href="<?= $router->generate('movie_page', ['slug' => $movie_1->slug, 'id' => $movie_1->id]) ?>" class="p-3 col-md-3 col-12 photo-1 bg-primary d-flex justify-content-start align-items-end" style="max-width: 440px; background-image:url('<?= $movie_1->photo ?>');"><h5 class="col-auto p-3 text-white text-center font-weight-normal" style="background-color: #131313;"><?= $movie_1->name ?> <span class="font-weight-lighter">- <?= $movie_1->realisator ?></span></h5></a>
    <div class="col-md-4 col-12 d-flex flex-column justify-content-center align-items-center">    
        <a href="<?= $router->generate('movie_page', ['slug' => $movie_2->slug, 'id' => $movie_2->id]) ?>" class="p-3 h-50 w-100 photo-2 bg-warning d-flex justify-content-start align-items-start" style="background-image:url('<?= $movie_2->photo ?>');"><h5 class="col-6 p-3 text-white text-center font-weight-normal" style="background-color: #131313;"><?= $movie_2->name ?> <br> <span class="font-weight-lighter">- <br> <?= $movie_2->realisator ?></span></h5></a>
        <a href="<?= $router->generate('movie_page', ['slug' => $movie_3->slug, 'id' => $movie_3->id]) ?>" class="p-3 h-50 w-100 photo-3 bg-danger d-flex justify-content-end align-items-end" style="background-image:url('<?= $movie_3->photo ?>');"><h5 class="col-auto p-3 text-white text-center font-weight-normal" style="background-color: #131313;"><?= $movie_3->name ?> <br>  <span class="font-weight-lighter">-  <br> <?= $movie_3->realisator ?></span></h5></a>
    </div>
    <a href="<?= $router->generate('movie_page', ['slug' => $movie_4->slug, 'id' => $movie_4->id]) ?>" class="p-3 col-md-3 col-12 photo-4 bg-success d-flex justify-content-end align-items-start" style="max-width: 440px; background-image:url('<?= $movie_4->photo ?>');"><h5 class="col-6 p-3 text-white text-center font-weight-normal" style="background-color: #131313;"> <?= $movie_4->name ?> <br> <span class="font-weight-lighter">-  <br> <?= $movie_4->realisator ?></span></h5></a>
</div>

<div class="row justify-content-center align-items-center mt-5" >
  <h1 class="col-md-8 col-8 mt-5 mb-3 align-self-start text-uppercase text-center text-white font-weight-light">INSCRIVEZ-VOUS À LA NEWSLETTER POUR NE RIEN RATER DU FESTIVAL ET DES INFOS EN EXCLUSIVITÉ !</h1>
</div>
<div class="row justify-content-center align-items-center">
    <h5 class="text-white text-center font-weight-light">Pour vous inscrire à notre newsletter, merci de saisir votre addresse email dans le champ situé ci-dessous.</h5>
</div>
<div class="row d-flex justify-content-center">
    <form action="" method="POST" class="col-md-8 col-sm-8 col-10 mt-3 mx-5 pt-3">
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


