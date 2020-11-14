<?php
session_start();
use App\Classe\Movie\Movie;
use App\Classe\Post\Post;

$title = "Accueil";

$posts_homepage = Post::getHomepagePosts();
$movies_homepage = Movie::getHomepageMovies();
?>

<section class="section-banniere d-flex justify-content-center align-items-center">
  <div class="section-banniere-video align-self-start">
    <video class="header-video" src="http://localhost:8000/video/movie.mp4" type="video/mp4" playsinline autoplay muted loop></video>
  </div>
  <div class="section-banniere-presentation p-5 mr-auto">
    <h1 class="text-uppercase text-dark font-weight-light"> Les films de plein air </h1>
    <h3 class="text-uppercase text-muted font-weight-lighter my-3"> 1ère édition </h3>
    <p class="text-justify font-weight-light text-dark"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus dolorem ipsam expedita non adipisci ut doloribus dolores eligendi qui, explicabo reiciendis maiores quis obcaecati amet velit, molestias, voluptatibus nemo laborum.</p>
    <div class="section-banniere-button">
      <button class="section-banniere-button-reservation btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Réserver ma place</button>
      <button class="section-banniere-button-contact btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Nous contacter</button>
    </div>          
  </div>
</section>

<section id="section" class="section-news-home d-flex align-items-start justify-content-center py-5 my-5">
  <?php foreach($posts_homepage as $post_homepage) : ?>
      <?php require 'admin/homepage/post_card.php'?>
  <?php endforeach ?>
</section>

<section id="section" class="section-programme-home d-flex flex-column py-5 my-5">
  <div class="program-films d-flex flex-wrap justify-content-center align-items-center p-4">
    <?php foreach($movies_homepage as $movie_homepage) : ?>
        <?php require 'admin/homepage/movie_card.php'?>
    <?php endforeach ?>
  </div>
  <button class="btn btn-dark rounded-0 mx-auto font-weight-lighter">Programme complet</button>
</section>

<section id="section" class="section-infos d-flex p-5 my-5 justify-content-center">
  <div id="section-infos-map" class="section-infos-map"></div>
  <div class="section-infos-infos px-5 d-flex flex-column justify-content-center">
    <h1 class="text-uppercase font-weight-light text-dark my-4">Infos pratiques</h1>
    <p class="text-justify font-weight-light text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi quo officiis, sed ratione doloremque ducimus reprehenderit, ea, iure quia voluptate doloribus quidem ex eligendi fuga dolorem quam laborum similique nostrum.
    </p>
    <p class="text-justify font-weight-light text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi quo officiis, sed ratione doloremque ducimus reprehenderit, ea, iure quia voluptate doloribus quidem ex eligendi fuga dolorem quam laborum similique nostrum.
    </p>
    <p class="text-justify font-weight-light text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi quo officiis, sed ratione doloremque ducimus reprehenderit, ea, iure quia voluptate doloribus quidem ex eligendi fuga dolorem quam laborum similique nostrum.
    </p>
    <p class="text-justify font-weight-light text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi quo officiis, sed ratione doloremque ducimus reprehenderit, ea, iure quia voluptate doloribus quidem ex eligendi fuga dolorem quam laborum similique nostrum.
    </p>
    <div class="section-header-button">
      <button class="section-header-button-reservation btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Réserver ma place</button>
      <button class="section-header-button-contact btn btn-dark rounded-0 my-3 ml-auto font-weight-lighter">Nous contacter</button>
    </div>   
  </div>
</section>

