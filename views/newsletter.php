<?php

if (isset($_POST['email'])) {

}

?>
<section class="section-gestion-newsletter container align-self-start my-5 w-100">
    <div class="d-flex">
        <h1 class="mt-5 mb-3 align-self-start text-uppercase text-dark font-weight-light">S'inscrire à notre newsletter</h1>
    </div>
    <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
        <h5 class="text-dark font-weight-light">Pour vous inscrire à notre newsletter, merci de saisir votre addresse email dans le champ situé ci-dessous.</h5>
    </div>
    <div class="row d-flex justify-content-center w-100 px-5">
        <form action="" method="POST" class="col-md-8 col-sm-12 mt-3 border mx-5 pt-3">
            <div class="form-group w-75 m-auto">
                <input type="email" class="form-control" name="email">
            </div>
            <div class="d-flex justify-content-center m-3">
                <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1">Je m'inscris</button>    
            </div>
        </form>
    </div>
</section>