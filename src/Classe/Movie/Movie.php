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

}