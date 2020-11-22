<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
    <h3 class="text-white text-center text-uppercase font-weight-light"><i class="fa fa-envelope-o" aria-hidden="true"></i> Envoyer une newsletter</h3>
</div>

<div class="row d-flex justify-content-center mt-3">
    <form action="" method="POST" class="col-md-8 col-12 mt-3 m-auto">
        <div class="form-group col-12 m-auto">
            <label class="text-white" for="title">Titre : </label>
            <input class="form-control rounded-0" name="title">
        </div>
        <div class="form-group col-12 m-auto">
            <label class="text-white mt-3" for="content">Message : </label>
            <textarea class="form-control rounded-0" name="content" rows="8"></textarea>
        </div>
        <div class="d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Envoyer</button>    
        </div>
    </form>
</div>
