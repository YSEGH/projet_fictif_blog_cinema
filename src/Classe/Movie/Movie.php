<?php

namespace App\Classe\Movie;

use DateTime;

class Movie {

    public $id;
    public $name;
    public $resume;
    public $created_at;
    public $slug;
    public $place;
    public $photo;
    public $realisator;

    public function getCreatedAt()
    {
        return new DateTime($this->created_at);
    }

    public function displayModal($movie)
    {
        return <<<HTML
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1>{$movie->name}</h1>
                    </div>
                </div>
            </div>
        </div>
HTML;
    }
}