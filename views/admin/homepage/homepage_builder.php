<?php
$title = "Personnalisation page d'accueil";
use App\Classe\Movie\Movie;
use App\Classe\Post\Post;

session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
$error_post = null;
$error_movie = null;
$count_posts_homepage = count(Post::getHomepagePosts());
if(!empty($_POST)){
    if($_POST['type'] === "post"){
        if($_POST['query'] === "add" && ($count_posts_homepage + 1) < 7){
            $error_post = null;
            Post::changePlace($_POST['id'], (int)$_POST['place']);
        } elseif($_POST['query'] === "suppr"){
            $error_post = null;
            Post::changePlace($_POST['id'], (int)$_POST['place']);           
        } else {
            $error_post = 'Vous ne pouvez pas afficher plus de 3 articles sur la page d\'accueil !';
        }
    } elseif($_POST['type'] === "movie") {
        Movie::changePlace($_POST['id'], (int)$_POST['place']);
    }
}
$posts_homepage = Post::getHomepagePosts();
$posts = Post::getAllPosts(null, null);
$movies = Movie::getAllMovies(null, null);
$movie_1 = Movie::getMovieHomepage(1)[0];
$movie_2 = Movie::getMovieHomepage(2)[0];
$movie_3 = Movie::getMovieHomepage(3)[0];
$movie_4 = Movie::getMovieHomepage(4)[0];
?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-center text-uppercase font-weight-light"><i class="fa fa-pencil-square" aria-hidden="true"></i> Personnalisation de la page d'accueil</h3>
</div>

<!-- RUBRIQUE POST -->
<div class="row d-flex flex-column justify-content-center align-items-center mt-5">
    <h3 class="mb-3 text-white font-weight-light">1. Gestion des articles</h3>
    <div class="row d-flex justify-content-center align-items-center px-5">
        <?php foreach($posts_homepage as $post) : ?>
            <div class="card-home col-md-2 col-sm-5 mb-3">
                <?php require 'post_card.php'?>
            </div>
        <?php endforeach ?>
    </div>        
</div>
<div class="row d-flex flex-column justify-content-center align-items-center">
    <h5 class="col-8 mt-4 mb-3 text-uppercase text-white text-center font-weight-light">Selectionnez les articles que vous souhaitez voir apparaitre sur la page d'accueil</h5>
    <p class="col-8 text-white text-center font-weight-bold">Attention, vous ne pouvez pas ajouter plus de 3 articles</p>
    <?php if($error_post) : ?>
        <div class="alert alert-danger"><?= $error_post ?></div>
    <?php endif ?>
    <div class="col-12 mt-3 d-flex justify-content-center" style="max-height: 20rem; overflow-y:scroll;">
        <table class="table table-striped text-center" style="width: 80vw;">
            <thead>
                <tr>
                    <th scope="col" class="col-auto text-white text-left border-bottom-0" >Titre</th>
                    <th scope="col" class="col-auto text-white border-bottom-0"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post) : ?>
                <tr>
                    <td class="col-auto align-middle text-white text-truncate text-left"> <?= substr($post->title, 0, 50) ?> </td>
                    <?php if((int)$post->place === 1) : ?>
                        <td class="col-auto align-middle">
                            <form action="" method="POST">
                                <input style="display:none" class="form-control" type="input" name="query" value="suppr">
                                <input style="display:none" class="form-control" type="input" name="type" value="post">
                                <input style="display:none" class="form-control" type="input" name="id" value="<?= $post->id ?>">
                                <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$post->place ?>">
                                <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
                            </form>
                        </td>
                    <?php else : ?>
                        <td class="col-auto align-middle">
                            <form action="" method="POST">
                                <input style="display:none" class="form-control" type="input" name="query" value="add">
                                <input style="display:none" class="form-control" type="input" name="type" value="post">
                                <input style="display:none" class="form-control" type="input" name="id" value="<?= $post->id ?>">
                                <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$post->place ?>">
                                <button class="btn btn-success font-weight-lighter rounded-0" type="submit">+</button>
                            </form>
                        </td>
                    <?php endif ?>  
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- RUBRIQUE FILMS -->
<div class="row d-flex flex-column justify-content-center align-items-center mt-5">
    <h3 class="mb-3 text-white font-weight-light">2. Gestion des films</h3>
</div>

<div class="photo-festival row d-flex justify-content-center m-0" style="min-height:80vh; ">
    <div class="p-3 col-md-3 col-12 photo-1 bg-primary d-flex flex-column justify-content-end align-items-start" style="max-width: 440px; background-image:url('<?= $movie_1->photo ?>');"><div class="bg-warning d-flex align-items-center justify-content-center m-auto" style="height:3rem; width: 3rem;"><h2 class="text-white m-auto">1</h2></div><h5 class="col-auto p-3 text-white text-center font-weight-normal" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_1->name ?> <br> <span class="font-weight-lighter">- <br> <?= $movie_1->realisator ?></span></h5></div>
    <div class="col-md-5 col-12 d-flex flex-column justify-content-center align-items-center">    
        <div class="p-3 h-50 w-100 photo-2 bg-warning d-flex justify-content-start align-items-start" style="background-image:url('<?= $movie_2->photo ?>');"><div class="bg-warning d-flex align-items-center justify-content-center m-auto" style="height:3rem; width: 3rem;"><h2 class="text-white m-auto">2</h2></div><h5 class="col-6 p-3 text-white text-center font-weight-normal" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_2->name ?> <br> <span class="font-weight-lighter">- <br> <?= $movie_2->realisator ?></span></h5></div>
        <div class="p-3 h-50 w-100 photo-3 bg-danger d-flex justify-content-end align-items-end" style="background-image:url('<?= $movie_3->photo ?>');"><div class="bg-warning d-flex align-items-center justify-content-center m-auto" style="height:3rem; width: 3rem;"><h2 class="text-white m-auto">3</h2></div><h5 class="col-auto p-3 text-white text-center font-weight-normal" style="background-color: RGBA(0, 0, 0, 0.85);"><?= $movie_3->name ?> <br>  <span class="font-weight-lighter">-  <br> <?= $movie_3->realisator ?></span></h5></div>
    </div>
    <div class="p-3 col-md-3 col-12 photo-4 bg-success d-flex justify-content-end align-items-start" style="max-width: 440px; background-image:url('<?= $movie_4->photo ?>');"><div class="bg-warning d-flex align-items-center justify-content-center m-auto" style="height:3rem; width: 3rem;"><h2 class="text-white m-auto">4</h2></div><h5 class="col-6 p-3 text-white text-center font-weight-normal" style="background-color: RGBA(0, 0, 0, 0.85);"> <?= $movie_4->name ?> <br> <span class="font-weight-lighter">-  <br> <?= $movie_4->realisator ?></span></h5></div>
</div>
<div class="row d-flex flex-column justify-content-center align-items-center">
    <h5 class="col-8 mt-4 mb-3 text-uppercase text-white text-center font-weight-light">Selectionnez les films que vous souhaitez voir apparaitre sur la page d'accueil</h5>
    <div class="col-md-12 col-12 mt-3 mb-5 d-flex justify-content-center" style="max-height: 20rem; overflow-y:scroll;">
        <table class="table table-striped text-center table-responsive" style="width: 80vw;">
            <thead>
                <tr>
                    <th scope="col" class="col-4 text-white text-truncate text-left border-bottom-0" >Nom</th>
                    <th scope="col" class="col-2 text-white border-bottom-0"></th>
                    <th scope="col" class="col-2 text-white border-bottom-0"></th>
                    <th scope="col" class="col-2 text-white border-bottom-0"></th>
                    <th scope="col" class="col-2 text-white border-bottom-0"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($movies as $movie) : ?>
                <tr>
                    <td class="col-4 align-middle text-truncate text-white text-left"> <?= substr($movie->name, 0, 50) ?> </td>
                    <td class="col-2 align-middle text-white">
                        <form action="" method="POST">
                            <input style="display:none" class="form-control" type="input" name="type" value="movie">
                            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                            <input style="display:none" class="form-control" type="input" name="place" value="1">
                            <button class="btn <?php if( (int)$movie->place === 1 ) : ?> btn-success <?php else : ?> btn-warning <?php endif ?> text-white font-weight-lighter rounded-0" type="submit">1</button>
                        </form>
                    </td>       
                    <td class="col-2 align-middle text-white">
                        <form action="" method="POST">
                            <input style="display:none" class="form-control" type="input" name="type" value="movie">
                            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                            <input style="display:none" class="form-control" type="input" name="place" value="2">
                            <button class="btn <?php if( (int)$movie->place === 2 ) : ?> btn-success <?php else : ?> btn-warning <?php endif ?> text-white font-weight-lighter rounded-0" type="submit">2</button>
                        </form>
                    </td>      
                    <td class="col-2 align-middle text-white">
                        <form action="" method="POST">
                            <input style="display:none" class="form-control" type="input" name="type" value="movie">
                            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                            <input style="display:none" class="form-control" type="input" name="place" value="3">
                            <button class="btn <?php if( (int)$movie->place === 3 ) : ?> btn-success <?php else : ?> btn-warning <?php endif ?> text-white font-weight-lighter rounded-0" type="submit">3</button>
                        </form>
                    </td>      
                    <td class="col-2 align-middle text-white">
                        <form action="" method="POST">
                            <input style="display:none" class="form-control" type="input" name="type" value="movie">
                            <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                            <input style="display:none" class="form-control" type="input" name="place" value="4">
                            <button class="btn <?php if( (int)$movie->place === 4 ) : ?> btn-success <?php else : ?> btn-warning <?php endif ?> text-white font-weight-lighter rounded-0" type="submit">4</button>
                        </form>
                    </td>              
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>






