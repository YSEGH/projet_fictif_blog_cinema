<?php
use App\Classe\Data\DataHelper;
session_start();
$data = new DataHelper;
if (!empty($_POST)) {
    if (isset($_POST['password_check']) && $_POST['password_check'] === $_SESSION['password']) {
        $_SESSION['password_checked'] = 1;
    }
    if (isset($_POST['password'])) {
        $_SESSION['password_checked'] = 1;
        $prepare = "UPDATE user SET password = :password WHERE username = :username";
        $execute =
        [
            'username' => $_SESSION['username'],
            'password' => $_POST['password']
        ];
        $new_password = $data->dataAction($prepare, $execute);
        $_SESSION['password'] = $_POST['password'];
        header('Location: ' . $router->generate('account'));
    }
}
?>

<div class="row justify-content-center align-items-center mt-5" style="height: 11vh;">
  <h3 class="text-white text-uppercase font-weight-light"><?php if(!isset($_SESSION['password_checked'])) : ?><i class="fa fa-lock" aria-hidden="true"></i><?php else : ?><i class="fa fa-unlock-alt" aria-hidden="true"></i><? endif ?> Modifier mon pot de passe</h3>
</div>

<div class="d-flex justify-content-center w-100 px-5">
    <form action="" method="POST" class="w-100 mt-3 mx-5 d-flex flex-column align-items-center justify-content-center">
        <?php if(!isset($_SESSION['password_checked'])) : ?>
        <div class="form-group w-50 p-3">
            <label class="text-white" for="password_check">Saisissez votre mot de passe actuel : </label>
            <input type="password" class="form-control rounded-0" name="password_check" value="" >
        </div>
        <?php endif ?>
        <?php if(isset($_SESSION['password_checked'])) : ?>
            <div class="form-group w-50 p-3">
                <label class="text-white" for="password">Saisissez votre nouveau mot de passe : </label>
                <input type="password" class="form-control rounded-0" name="password" value="<?= $user[0]->password ?>">
            </div>
        <?php endif ?>
        <div class="d-flex justify-content-center m-3">
            <a href="<?= $router->generate('account') ?>" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" >Annuler</a>
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Valider</button>    
        </div>
    </form>
</div>
