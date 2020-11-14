<?php
$title = "Homepage builder";
use App\Classe\Movie\Movie;
use App\Classe\Post\Post;

session_start();

$error_post = null;
$error_movie = null;
$count_posts_homepage = count(Post::getHomepagePosts());
$count_movies_homepage = count(Movie::getHomepageMovies());
if(!empty($_POST)){
    if($_POST['type'] === "post"){
        if($_POST['query'] === "add" && ($count_posts_homepage + 1) < 4){
            $error_post = null;
            Post::changePlace($_POST['id'], (int)$_POST['place']);
        } elseif($_POST['query'] === "suppr"){
            $error_post = null;
            Post::changePlace($_POST['id'], (int)$_POST['place']);           
        } else {
            $error_post = 'Vous ne pouvez pas afficher plus de 3 articles sur la page d\'accueil !';
        }
    } elseif($_POST['type'] === "movie") {
        if($_POST['query'] === "add" && ($count_movies_homepage + 1) < 5){
            $error_movie = null;
            Movie::changePlace($_POST['id'], (int)$_POST['place']);
        } elseif($_POST['query'] === "suppr"){
            $error_movie = null;
            Movie::changePlace($_POST['id'], (int)$_POST['place']);           
        } else {
            $error_movie = 'Vous ne pouvez pas afficher plus de 4 films sur la page d\'accueil !';
        }
    }
}
$posts_homepage = Post::getHomepagePosts();
$movies_homepage = Movie::getHomepageMovies();
$posts = Post::getAllPosts(null, null);
$movies = Movie::getAllMovies(null, null);
?>

<section class="container align-self-start my-4 w-100">
    <div class="d-flex justify-content-between">
        <h1 class="text-uppercase text-dark font-weight-light">Page d'accueil</h1>
    </div>
    <!-- RUBRIQUE POST -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <h3 class="w-100 mb-3 align-self-start text-uppercase text-dark font-weight-light" style="background-color: GhostWhite;">Gestion des articles</h5>
        <div class="mt-3 d-flex justify-content-center">
            <?php foreach($posts_homepage as $post_homepage) : ?>
                <?php require 'post_card.php'?>
            <?php endforeach ?>
        </div>        
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <h5 class="mb-3 text-uppercase text-dark font-weight-light">Selectionnez les articles que vous souhaitez voir apparaitre sur la page d'accueil</h5>
        <p class="font-weight-bold">Attention, vous ne pouvez pas ajouter plus de 3 articles</p>
        <?php if($error_post) : ?>
            <div class="alert alert-danger"><?= $error_post ?></div>
        <?php endif ?>
        <div class="border-right border-left w-75 mt-3" style="max-height:30vh; overflow:scroll">
            <table class="table table-striped text-center" >
                <thead>
                    <tr>
                        <th scope="col" class="text-left border-bottom-0" >Titre</th>
                        <th scope="col" class="text-left border-bottom-0" >Emplacement</th>
                        <th scope="col" class="border-bottom-0"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($posts as $post) : ?>
                    <tr>
                        <td class="align-middle text-truncate text-left"> <?= substr($post->title, 0, 60) . '...' ?> </td>
                        <td class="align-middle text-truncate text-left"> <?= (int)$post->place === 1 ? "Page d'accueil" : "" ?> </td>
                        <?php if((int)$post->place === 1) : ?>
                            <td class="align-middle">
                                <form action="" method="POST">
                                    <input style="display:none" class="form-control" type="input" name="query" value="suppr">
                                    <input style="display:none" class="form-control" type="input" name="type" value="post">
                                    <input style="display:none" class="form-control" type="input" name="id" value="<?= $post->id ?>">
                                    <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$post->place ?>">
                                    <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
                                </form>
                            </td>
                        <?php else : ?>
                            <td class="align-middle">
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
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
        <h3 class="w-100 mb-3 align-self-start text-uppercase text-dark font-weight-light" style="background-color: GhostWhite;">Gestion des films</h5>
        <div class="mt-3 d-flex justify-content-center">
            <?php foreach($movies_homepage as $movie_homepage) : ?>
                <?php require 'movie_card.php'?>
            <?php endforeach ?>
        </div>        
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <h5 class="text-uppercase text-dark font-weight-light mt-5">Selectionnez les films que vous souhaitez voir apparaitre sur la page d'accueil</h5>
        <p class="font-weight-bold">Attention, vous ne pouvez pas ajouter plus de 4 films</p>
        <?php if($error_movie) : ?>
            <div class="alert alert-danger"><?= $error_movie ?></div>
        <?php endif ?>
        <div class="border-right border-left mt-3 w-75" style="max-height:30vh; overflow:scroll">
            <table class="table table-striped text-center" >
                <thead>
                    <tr>
                        <th scope="col" class="text-left border-bottom-0" >Nom</th>
                        <th scope="col" class="text-left border-bottom-0" >Emplacement</th>
                        <th scope="col" class="border-bottom-0"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($movies as $movie) : ?>
                    <tr>
                        <td class="align-middle text-truncate text-left"> <?= substr($movie->name, 0, 60) . '...' ?> </td>
                        <td class="align-middle text-truncate text-left"> <?= (int)$movie->place === 1 ? "Page d'accueil" : "" ?> </td>
                        <?php if((int)$movie->place === 1) : ?>
                            <td class="align-middle">
                                <form action="" method="POST">
                                    <input style="display:none" class="form-control" type="input" name="query" value="suppr">
                                    <input style="display:none" class="form-control" type="input" name="type" value="movie">
                                    <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                                    <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$movie->place ?>">
                                    <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
                                </form>
                            </td>
                        <?php else : ?>
                            <td class="align-middle">
                                <form action="" method="POST">
                                    <input style="display:none" class="form-control" type="input" name="query" value="add">
                                    <input style="display:none" class="form-control" type="input" name="type" value="movie">
                                    <input style="display:none" class="form-control" type="input" name="id" value="<?= $movie->id ?>">
                                    <input style="display:none" class="form-control" type="input" name="place" value="<?= (int)$movie->place ?>">
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
</section>





