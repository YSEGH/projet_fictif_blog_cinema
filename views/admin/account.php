<?php
use App\Classe\User\User;
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
if (isset($_SESSION['password_checked'])) {
    unset($_SESSION['password_checked']);
}

if (!empty($_POST)) {
    User::updateUser($_SESSION['username'], $_SESSION['password'], $_POST['phone'], $_POST['email']);
    $_SESSION['username'] = $_POST['username'];
}

$auth = new User;
$user = $auth->recupUserInfos($_SESSION['username'], $_SESSION['id']);

?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-key" aria-hidden="true"></i> Mon compte <span class="text-white font-weight-lighter">- <?= $user[0]->role ?></span></h3>
</div>

<div class="row d-flex justify-content-center  mt-5">
    <form action="" method="POST" class="mt-3 col-12 d-flex flex-wrap align-items-center justify-content-center m-auto">
        <div class="form-group col-md-5 col-sm-12 ">
            <label class="text-white" for="email">Email : </label>
            <input type="email" class="form-control rounded-0" name="email" value="<?= $user[0]->email ?>">
        </div>
        <div class="form-group col-md-5 col-sm-12 ">
            <label class="text-white" for="phone">Téléphone : </label>
            <input type="text" class="form-control rounded-0" name="phone" value="<?= $user[0]->phone ?>">
        </div>
        <div class="form-group col-md-5 col-sm-12 ">
            <label class="text-white" for="username">Nom de compte : </label>
            <input class="form-control rounded-0" name="username" id="" value="<?= $user[0]->username ?>" disabled>
        </div>
        <div class="form-group col-md-5 col-sm-12 ">
            <label class="text-white" for="">Mot de passe : </label>
            <input type="password" class="form-control rounded-0" name="" value="<?= substr($user[0]->password, 0, 6) ?>" disabled>
        </div>
        <div class="d-flex flex-column justify-content-center m-3">
            <a href="<?= $router->generate('password_update')?>" class=" align-self-start btn btn-secondary font-weight-lighter rounded-0 mt-auto my-2 mx-1">Modifier mon mot de passe</a>  
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Valider les modifications</button>    
        </div>
    </form>
</div>
