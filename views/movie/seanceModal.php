<?php
use App\Classe\FunctionHelper\FunctionHelper;
use App\Classe\Movie\Movie;

$id = $movie->movie_id ? $movie->movie_id : $movie->id;

$seances = Movie::recupProgramme($id);

?>

<div id="myModal<?=$id?>" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-0" style="background-color: #131313;">
            <div class="modal-body">
                <h3 class="m-3 text-white"><?= $movie->name ?></h3>
                <?php foreach($seances as $seance) : ?>
                    <div class="seance-container border-top d-flex justify-content-between align-items-center px-4">
                        <div class="date text-white"><?= FunctionHelper::convertCreatedAt($seance->date)->format('d F Y à H:i') ?></div>
                        <a data-toggle="modal" class="btn btn-dark font-weight-lighter rounded-0 m-1" href="#reservationModal<?=$id?>" style="background-color: #EF6962;"><i class="fa fa-ticket" aria-hidden="true"></i></a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<div id="reservationModal<?=$id?>" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-0" style="background-color: #131313;">
            <div class="modal-body">
                <h3 class="text-center text-white m-3">Réservation</h3>
                <div class="row d-flex justify-content-center mt-5">
                    <form action="" method="POST" class="mt-3 col-12 d-flex flex-wrap align-items-center justify-content-center m-auto">
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="film">Film : </label>
                            <input type="text" class="form-control rounded-0" name="film" value="<?= $movie->name ?>">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="program">Séance : </label>
                            <input type="text" class="form-control rounded-0" name="program" value="<?= $movie->date ?>">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="name">Nom : </label>
                            <input type="text" class="form-control rounded-0" name="name" value="">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="firstname">Prénom : </label>
                            <input type="text" class="form-control rounded-0" name="firstname" value="">
                        </div>

                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="email">Email : </label>
                            <input type="email" class="form-control rounded-0" name="email" value="">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 ">
                            <label class="text-white" for="phone">Téléphone : </label>
                            <input type="text" class="form-control rounded-0" name="phone" value="">
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label class="text-white" for="placeNumber">Nombre de place(s) :</label>
                            <select name="placeNumber" class="col-6 form-control m-auto" id="exampleFormControlSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-center m-3">
                            <a href="" data-dismiss="modal" class="btn btn-light border font-weight-lighter rounded-0 mt-auto mx-1" >Annuler</a>
                            <button type="submit" class="btn btn-dark font-weight-lighter rounded-0 mt-auto mx-1" style="background-color: #EF6962;">Réserver</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>