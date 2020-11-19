<?php

use App\Classe\Data\DataHelper;
use App\Classe\Movie\Movie;

session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
if(!empty($_POST)){
    if($_POST['query'] === 'add'){
        $add = Movie::addCategory($params['id'], (int)$_POST['id']);
    } else {
        $delete = Movie::deleteCategory($params['id'], (int)$_POST['id']);
    }
}

$data = new DataHelper;
$categories = $data->recupTable('moviecategory', null, null, null);
$movie = Movie::getMovie($params['slug'],$params['id']);
$movie_categories = Movie::recupCategories($params['id']);
$movie_categories_array = [];
foreach($movie_categories as $movie_category) {
    $movie_categories_array[] = $movie_category->name;
}

?>
<section class="container align-self-start my-4 w-100">
    <div class="d-flex justify-content-between">
        <h1 class="text-uppercase text-dark font-weight-light">Catégories - <?= $movie->name ?></h1>
    </div>

    <div class="table_categories w-50 mt-3 m-auto" style="height:auto; max-height:60vh; overflow:scroll;">
        <table class="table table-striped text-center mt-3" >
            <thead>
                <tr>
                    <th scope="col" class="text-left border-bottom-0" >Catégories</th>
                    <th scope="col" class="border-bottom-0"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category) : ?>
                <tr>
                    <td class="align-middle text-truncate text-left"> <?= $category->name ?> </td>
                    <?php if(in_array($category->name, $movie_categories_array)) : ?>
                        <td class="align-middle">
                            <form action="" method="POST">
                                <input style="display:none" class="form-control" type="input" name="query" value="suppr">
                                <input style="display:none" class="form-control" type="input" name="type" value="category">
                                <input style="display:none" class="form-control" type="input" name="id" value="<?= $category->id ?>">
                                <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
                            </form>
                        </td>
                    <?php else : ?>
                        <td class="align-middle">
                            <form action="" method="POST">
                                <input style="display:none" class="form-control" type="input" name="query" value="add">
                                <input style="display:none" class="form-control" type="input" name="type" value="category">
                                <input style="display:none" class="form-control" type="input" name="id" value="<?= $category->id ?>">
                                <button class="btn btn-success font-weight-lighter rounded-0" type="submit">+</button>
                            </form>
                        </td>
                    <?php endif ?>  
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
            <div class="d-flex justify-content-center m-3">
                <a href="<?= $router->generate('update_movie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" >Retour</a>
                <a href="<?= $router->generate('update_movie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Valider</a>    
            </div>
 
</section>