<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: /');
}
use App\Classe\Data\DataHelper;
$data = new DataHelper;
if (!empty($_POST)) {
    $prepare = "UPDATE infos SET email = :email, phone = :phone, address = :address, metro = :metro, bus = :bus, presentation = :presentation WHERE id = :id";
    $execute = 
    [
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'address' => $_POST['address'],
        'metro' => $_POST['metro'],
        'bus' => $_POST['bus'],
        'presentation' => $_POST['presentation'],
        'id' => 1
    ];
    $data->dataAction($prepare, $execute);
}
$infos = $data->recupTable('infos', null, null, null);
?>
<div class="row align-items-center p-3" style="height: auto;">
  <div class="icon-site col-md-1 col-2" style="background-color: #42A1B4;"></div>
  <h5 class="col-md-2 col-6 text-white my-auto">FESTIVAL INTERNATIONAL DU FILM <span class="font-weight-lighter">DE NIORT</span></h5>
</div>

<div class="row justify-content-center align-items-center mt-5" style="height: auto;">
  <h3 class="text-white text-uppercase font-weight-light"><i class="fa fa-address-book" aria-hidden="true"></i> Infos générales</h3>
</div>

<div class="d-flex justify-content-center px-5">
    <form action="" method="POST" class="col-12 mt-3 d-flex flex-wrap align-items-center justify-content-center p-3" >
        <div class="form-group col-md-5 col-sm-12 px-3">
            <label class="text-white" for="email">Email : </label>
            <input type="email" class="form-control rounded-0" name="email" value="<?= $infos[0]->email ?>">
        </div>
        <div class="form-group col-md-5 col-sm-12 px-3">
            <label class="text-white" for="phone">Téléphone : </label>
            <input type="text" class="form-control rounded-0" name="phone" value="<?= $infos[0]->phone ?>">
        </div>
        <div class="form-group col-md-10 col-12 px-3">
            <label class="text-white" for="address">Adresse : </label>
            <textarea class="form-control rounded-0" name="address" id="" cols="30" rows="1"><?= $infos[0]->address ?></textarea>
        </div>
        <div class="form-group col-md-5 col-sm-12 px-3">
            <label class="text-white" for="metro">Ligne(s) de métro: </label>
            <input type="text" class="form-control rounded-0" name="metro" value="<?= $infos[0]->metro ?>">
        </div>
        <div class="form-group col-md-5 col-sm-12 px-3">
            <label class="text-white" for="bus">Ligne(s) de bus: </label>
            <input type="text" class="form-control rounded-0" name="bus" value="<?= $infos[0]->bus ?>">
        </div>
        <div class="form-group col-md-10 col-12 d-flex flex-column m-1">
            <label class="text-white" for="presentation">Texte de présentation : </label>
            <textarea class="form-control rounded-0" name="presentation" id="" cols="30" rows="8"><?= $infos[0]->presentation ?></textarea>
        </div>
        <div class="col-12 d-flex justify-content-center m-3">
            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Envoyer</button>    
        </div>
    </form>
</div>
