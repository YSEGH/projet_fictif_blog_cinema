<?php

use App\Classe\User\User;

session_start();

if (isset($_SESSION['auth'])) {
    header('Location: /dashboard');
}

$user = new User;
$error = null;
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $auth = $user->getAuth($_POST['username'], $_POST['password']);
    if (!empty($auth)) {
        session_start();
        $_SESSION['auth'] = 1;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: ' . $router->generate('account'));
    } else {
        $error = "Votre nom d'utilisateur ou votre mot de passe est incorrect";
    }
}

?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-key" aria-hidden="true"></i> Connexion</span></h3>
</div>

<div class="container form-container d-flex flex-column justify-content-center align-items-center p-5">
    <?php if ($error) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif ?>
    <form action="" method="POST" class="d-flex flex-column justify-content-center p-5">
        <div class="form-group">
            <input class="form-control rounded-0" type="text" name="username" placeholder="Nom d'utilisateur">
        </div>
        <div class="form-group">
            <input class="form-control rounded-0" type="password" name="password" placeholder="Mot de passe">
        </div>            
        <button type="submit" class="btn btn-dark rounded-0 mt-5 mx-auto" style="background-color: #EF6962;">Valider</button>
    </form>
</div>
