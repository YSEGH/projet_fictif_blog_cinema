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

<section id="section" class="section-banniere justify-content-center">
  <div class="row  align-items-center mt-5" style="height: auto;">
    <a href="<?= $router->generate('home') ?>" class="col-4 icon-site" style="background-color: #42A1B4; height:100%;"></a>
    <h5 class="col-4 text-white">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
  </div>
  <div id="carouselExampleSlidesOnly" class="d-flex justify-content-center carousel slide mt-3 pt-5 mx-auto" data-ride="carousel">
    <div class="col-md-10 col-7 carousel-inner" style="height:auto; max-height: 70vh; width:auto;" >
      <div class="carousel-item active mx-auto">
          <img src="http://localhost:8000/img/desert.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item mx-auto">
        <img src="http://localhost:8000/img/nuit.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item mx-auto">
        <img src="http://localhost:8000/img/seule.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
  </div>
</section>

<section id="section" class="section-news-home d-flex flex-column  align-items-center justify-content-start" style="width:auto;height: auto;">
  <h3 class="text-white align-self-start text-uppercase font-weight-normal"><i class="ml-4 fa fa-newspaper-o p-1" aria-hidden="true"></i> Actualités</h3>
  <div class="row d-flex justify-content-center">
    <?php foreach($posts_homepage as $post_homepage) : ?>
      <a class="col-md-3 col-6 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
          <?php require 'admin/homepage/post_card.php'?>
      </a>
    <?php endforeach ?>
  </div>
  <div class="row d-flex justify-content-center">
    <?php foreach($posts_homepage as $post_homepage) : ?>
      <a class="col-md-3 col-6 card-post-homepage px-0 m-1 mb-2" style="overflow: hidden;">
          <?php require 'admin/homepage/post_card.php'?>
      </a>
    <?php endforeach ?>
  </div>
</section>

<section id="section" class="section-homepage-program d-flex flex-column justify-content-center align-items-center" style="width:58rem;height: auto;">
  <h3 class="col-4 text-white align-self-start text-uppercase font-weight-normal"><i class="fa fa-calendar p-1" aria-hidden="true"></i> Programme</h3>
  <div class="row d-flex justify-content-center">
  <?php for ($i=12; $i < 17; $i++) : ?>
    <a class="col-md-2 col-sm-3 col-6 link-homepage-program mx-2 d-flex justify-content-center align-items-center">
      <h3><?= $i ?> - Oct</h3>
    </a>
  <?php endfor ?>
  </div>
</section>

<section id="section" class="section-photo-festival container d-flex flex-column justify-content-center">
  <h3 class="text-white align-self-start text-uppercase font-weight-normal"><i class="fa fa-film p-1" aria-hidden="true"></i> Films à l'affiche</h3>
  <div class="photo-festival row d-flex justify-content-center m-0" style="min-height:80vh;">
    <div class="p-3 col-md-3 col-8 photo-1 bg-primary d-flex justify-content-start align-items-end"><h3 class="col-5 p-3 text-white text-center font-weight-normal" style="background-color: #131313;">Seule <span class="font-weight-lighter">- Etienne Galois</span></h3></div>
    <div class="col-md-6 col-6 d-flex flex-column">    
      <div class="p-3 h-50 w-100 photo-2 bg-warning d-flex justify-content-start align-items-start"><h3 class="col-5 p-3 text-white text-center font-weight-normal" style="background-color: #131313;">Ailleurs <br> <span class="font-weight-lighter">- <br> Etienne Galois</span></h3></div>
      <div class="p-3 h-50 w-100 photo-3 bg-danger d-flex justify-content-end align-items-end"><h3 class="col-5 p-3 text-white text-center font-weight-normal" style="background-color: #131313;">Ensemble <br>  <span class="font-weight-lighter">-  <br> Etienne Galois</span></h3></div>
    </div>
    <div class="p-3 col-md-3 col-8 photo-4 bg-success d-flex justify-content-end align-items-start"><h3 class="col-5 p-3 text-white text-center font-weight-normal" style="background-color: #131313;"> La route <br> <span class="font-weight-lighter">-  <br> Etienne Galois</span></h3></div>
  </div>
</section>


  <section class="section-gestion-newsletter container">
    <div class="row justify-content-center">
        <h1 class="col-md-8 col-sm-8 col-6 mt-5 mb-3 align-self-start text-uppercase text-center text-white font-weight-light">INSCRIVEZ-VOUS À LA NEWSLETTER POUR NE RIEN RATER DU FESTIVAL ET DES INFOS EN EXCLUSIVITÉ !</h1>
    </div>
    <div class="row justify-content-center align-items-center">
        <h5 class="text-white font-weight-light">Pour vous inscrire à notre newsletter, merci de saisir votre addresse email dans le champ situé ci-dessous.</h5>
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
            <div class="d-flex justify-content-center m-3">
                <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 m-auto" style="background-color: #EF6962;">Je m'inscris</button>    
            </div>
        </form>
    </div>
  </section>

    <section class="section-homepage-medias row d-flex justify-content-center align-items-center" style="height: 30vh;">
      <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-facebook-official fa-4x" aria-hidden="true"></i></a>
      <a href="https://www.instagram.com/?hl=fr" class="mx-2 text-white"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
    </section>


