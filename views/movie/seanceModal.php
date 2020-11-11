<?php
use App\Classe\FunctionHelper\FunctionHelper;
?>
<div id="myModal<?=$movie->id?>" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content rounded-0">
            <div class="modal-body">
                <h3 class="m-3"><?= $movie->name ?></h3>
                <?php $seances = $data->many("SELECT * 
                                                FROM movie_has_programme 
                                                JOIN programme ON movie_has_programme.programme_id = programme.id
                                                WHERE movie_has_programme.movie_id = $movie->id");
                ?>
                <?php foreach($seances as $seance) : ?>
                    <div class="seance-container border-top d-flex justify-content-between align-items-center px-4">
                        <div class="date"><?= FunctionHelper::convertCreatedAt($seance->date)->format('d F Y à H:i') ?></div>
                        <a class="btn btn-dark font-weight-lighter rounded-0 m-1" href="">Réserver</a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>