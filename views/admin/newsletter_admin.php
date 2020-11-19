<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
?>

<div class="row justify-content-center align-items-center mt-5" style="height: 11vh;">
    <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-envelope-o" aria-hidden="true"></i> Envoyer une newsletter</h3>
</div>

<div class="row d-flex justify-content-center mt-3">
    <form action="" method="POST" class="col-10 mt-3 m-auto p-3">
        <div class="form-group col-10 m-auto">
            <label class="text-white" for="title">Titre : </label>
            <input class="form-control rounded-0" name="title">
        </div>
        <div class="form-group col-10 m-auto">
            <label class="text-white mt-3" for="content">Message : </label>
            <textarea class="form-control rounded-0" name="content" rows="8"></textarea>
        </div>
        <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Envoyer</button>    
        </div>
    </form>
</div>
