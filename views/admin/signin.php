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
        header('Location: ' . $router->generate('dashboard'));
    } else {
        $error = "Votre nom d'utilisateur ou votre mot de passe est incorrect";
    }
}

?>

<section class="section-form container my-5">
    <div class="container form-container d-flex flex-column justify-content-center align-items-center p-5">
        <?php if ($error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif ?>
        <h1>Connexion</h1>
        <form action="" method="POST" class="d-flex flex-column justify-content-center border  p-5">
            <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Nom d'utilisateur">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Mot de passe">
            </div>            
            <button type="submit" class="btn btn-dark rounded-0 mt-5 mx-auto">Valider</button>
        </form>
    </div>
</section>