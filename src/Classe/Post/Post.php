<?php

namespace App\Classe\Post;

use App\Classe\Data\DataHelper;
use DateTime;

class Post {

    public $id;
    public $title;
    public $content;
    public $created_at;
    public $last_update;
    public $slug;
    public $place;
    public $photo;
    public $author;

    public static function getAllPosts($per_page, $offset)
    {
        $data = new DataHelper;
        return $data->recupTable('post', $per_page, $offset, Post::class);
    }

    public function getCreatedAt()
    {
        return new DateTime($this->created_at);
    }

    public function getLastUpdate()
    {
        return new DateTime($this->last_update);
    }

    public static function addPost($slug, $title, $content, $author, $photo, $place)
    {
        $prepare = "INSERT INTO post (slug, title, content, created_at, author, photo, place) VALUES (:slug, :title, :content, :created_at, :author, :photo, :place)";
        $execute = 
        [
            'slug' => $slug,
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d'),
            'author' => $author,
            'photo' => "http://localhost:8000/img/" . $photo,
            'place' => $place,
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }
    
    public static function getPost($slug, $id)
    {
        $prepare = "SELECT * FROM post WHERE slug = :slug AND id = :id";
        $execute = 
        [
            'slug' => $slug,
            'id' => $id
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Post::class)[0];
    }

    public static function deletePost($slug, $id)
    {
        $prepare = "DELETE FROM post WHERE slug = :slug AND id = :id";
        $execute = 
        [
            'slug' => $slug,
            'id' => $id
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }

    public static function updatePost($slug, $id, $title, $content, $author, $photo, $place)
    {
        //dd(date("Y-m-d"));
        $prepare = "UPDATE post SET last_update = :last_update";
        $execute = ["slug" => $slug, "id" => $id, "last_update" => date("Y-m-d H:i")];
        if ($title !== null) {
            $prepare .= ", title = :title";
            $executeTitle = ["title" => $title];
            $execute = array_merge($execute, $executeTitle);
        };
        if ($content !== null) {
            $prepare .= ", content = :content";
            $executeContent = ["content" => $content];
            $execute = array_merge($execute, $executeContent);
        }
        if ($author !== null) {
            $prepare .= ", author = :author";
            $executeAuthor = ["author" => $author];
            $execute = array_merge($execute, $executeAuthor);
        };
        if ($photo !== null) {
            $prepare .= ", photo = :photo";
            $executePhoto = ["photo" => "http://localhost:8000/img/" . $photo];
            $execute = array_merge($execute, $executePhoto);
        };
        if ($place === 1) {
            $prepare .= ", place = :place";
            $executePlace = ["place" => 1];
        } else { 
            $prepare .= ", place = :place";       
            $executePlace = ["place" => 0];    
        };
        $execute = array_merge($execute, $executePlace);  
        $prepare .= " WHERE slug = :slug AND id = :id";

        $data = new DataHelper;
        $data->dataAction($prepare, $execute, Post::class);
    }

}