<?php

namespace App\Classe\Post;

use DateTime;

class Post {

    public $id;
    public $title;
    public $content;
    public $created_at;
    public $slug;
    public $place;
    public $photo;
    public $author;


    public function getCreatedAt()
    {
        return new DateTime($this->created_at);
    }

}