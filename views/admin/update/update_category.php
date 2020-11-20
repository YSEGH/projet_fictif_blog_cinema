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
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-plus" aria-hidden="true"></i> Catégories - <?= $movie->name ?></h3>
</div>

<div class="col-12 mt-3 d-flex justify-content-center" style="max-height: 25rem; overflow-y:scroll;">
    <table class="table table-striped m-auto mt-3" style="width: 30vw;">
        <thead>
            <tr>
                <th scope="col" class="col-auto text-white border-bottom-0" >Catégories</th>
                <th scope="col" class="col-auto border-bottom-0"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $category) : ?>
            <tr>
                <td class="col-auto align-middle text-truncate text-white"> <?= $category->name ?> </td>
                <?php if(in_array($category->name, $movie_categories_array)) : ?>
                    <td class="col-auto align-middle text-white">
                        <form action="" method="POST">
                            <input style="display:none" class="form-control" type="input" name="query" value="suppr">
                            <input style="display:none" class="form-control" type="input" name="type" value="category">
                            <input style="display:none" class="form-control" type="input" name="id" value="<?= $category->id ?>">
                            <button class="btn btn-danger font-weight-lighter rounded-0" type="submit">-</button>
                        </form>
                    </td>
                <?php else : ?>
                    <td class="col-auto align-middle text-white">
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
    <a href="<?= $router->generate('update_movie', ['slug' => $movie->slug, 'id' => $movie->id]) ?>" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Valider</a>    
</div>
 
