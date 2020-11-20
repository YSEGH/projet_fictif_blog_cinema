<?php
session_start();

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;
use App\Classe\Post\Post;

$title = "Accueil";
$data = new DataHelper;
$infos = $data->recupTable('infos', null, null, null)[0];
$posts_homepage = Post::getHomepagePosts();
$movies_homepage = Movie::getHomepageMovies();
?>

<section class="section-banniere row d-flex justify-content-center align-items-center m-0" style="height: auto;">
  <div class="section-banniere-video align-self-start col-md-6 col-sm-12">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" style="max-height: 70vh; max-width:70vw;" >
        <div class="carousel-item active">
            <img src="http://localhost:8000/img/desert.jpg" class="d-block h-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://localhost:8000/img/nuit.jpg" class="d-block h-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="http://localhost:8000/img/seule.jpg" class="d-block h-100" alt="...">
        </div>
      </div>
    </div>
  </div>
  <div class="section-banniere-presentation p-5 col-md-6 col-sm-12">
    <h1 class="text-uppercase text-dark font-weight-light"> Les films de plein air </h1>
    <h3 class="text-uppercase text-muted font-weight-lighter my-3"> 1ère édition </h3>
    <p class="text-justify font-weight-light text-dark"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus dolorem ipsam expedita non adipisci ut doloribus dolores eligendi qui, explicabo reiciendis maiores quis obcaecati amet velit, molestias, voluptatibus nemo laborum.</p>
    <div class="section-banniere-button">
      <button class="section-banniere-button-reservation btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Réserver ma place</button>
      <button class="section-banniere-button-contact btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Nous contacter</button>
    </div>          
  </div>
</section>

<section id="section" class="section-news-home row d-flex align-items-start justify-content-center py-5 my-5" style="height: auto;">
  <?php foreach($posts_homepage as $post_homepage) : ?>
    <div class="col-md-3 col-sm-12 " >
        <?php require 'admin/homepage/post_card.php'?>
    </div>
  <?php endforeach ?>
</section>

<section id="section" class="section-programme-home d-flex flex-column py-5 my-5">
  <div class="row program-films d-flex flex-wrap justify-content-center align-items-center">
    <?php foreach($movies_homepage as $movie_homepage) : ?>
      <div class="film col-md-5 col-sm-12 m-2 mb-5" style="min-height: 15rem;">
        <?php require 'admin/homepage/movie_card.php'?>
      </div>
    <?php endforeach ?>
  </div>
  <button class="btn btn-dark rounded-0 mx-auto font-weight-lighter">Programme complet</button>
</section>

<section class="section-gestion-newsletter container align-self-start my-5 w-100">
  <div class="d-flex">
      <h1 class="mt-5 mb-3 align-self-start text-uppercase text-center text-dark font-weight-light">INSCRIVEZ-VOUS À LA NEWSLETTER POUR NE RIEN RATER DU FESTIVAL ET DES INFOS EN EXCLUSIVITÉ !</h1>
  </div>
  <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
      <h5 class="text-dark font-weight-light">Pour vous inscrire à notre newsletter, merci de saisir votre addresse email dans le champ situé ci-dessous.</h5>
  </div>
  <div class="row d-flex justify-content-center w-100 px-5">
      <form action="" method="POST" class="col-md-8 col-sm-12 mt-3 border mx-5 pt-3">
          <div class="form-group w-75 m-auto">
              <input type="email" class="form-control" name="email">
          </div>
          <div class="d-flex justify-content-center m-3">
              <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Je m'inscris</button>    
          </div>
      </form>
  </div>
</section>


