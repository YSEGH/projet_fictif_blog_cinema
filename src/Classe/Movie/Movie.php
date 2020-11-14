<?php

namespace App\Classe\Movie;

use App\Classe\Data\DataHelper;
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

    public static function getAllMovies($per_page, $offset)
    {
        $data = new DataHelper;
        return $data->recupTable('movie', $per_page, $offset, Movie::class);
    }

    public static function getMovie($slug, $id)
    {
        $prepare = "SELECT * FROM movie WHERE slug = :slug AND id = :id";
        $execute = 
        [
            'slug' => $slug,
            'id' => $id
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Movie::class)[0];
    }

    public static function addMovie($slug, $name, $release_date, $resume, $realisator, $actor, $photo, $place)
    {
        $prepare = "INSERT INTO movie (slug, name, release_date, created_at, resume, realisator, actor, photo, place) VALUES (:slug, :name, :release_date, :created_at, :resume, :realisator, :actor, :photo, :place )";
        $execute = 
        [
            'slug' => $slug,
            'name' => $name,
            'release_date' => $release_date,
            'created_at' => date('Y-m-d'),
            'resume' => $resume,
            'realisator' => $realisator,
            'actor' => $actor,
            'photo' => "http://localhost:8000/img/" . $photo,
            'place' => $place,
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }


    public static function getHomepageMovies()
    {
        $prepare = "SELECT * FROM movie WHERE place = :place";
        $execute = 
        [
            'place' => 1
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Movie::class);
    }

    public static function changePlace($id, $place)
    {
        $place === 1 ? $new_place = 0 : $new_place = 1;
        $prepare = "UPDATE movie SET place = :place WHERE id = :id";
        $execute = 
        [
            'id' => $id,
            'place' => $new_place
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }

    public static function updateMovie($slug, $id, $name, $release_date, $resume, $realisator, $actor, $photo, $place)
    {
        $prepare = "UPDATE movie SET";
        $execute = ["slug" => $slug, "id" => $id];
        if ($name !== null) {
            $prepare .= " name = :name";
            $executeName = ["name" => $name];
            $execute = array_merge($execute, $executeName);
        };
        if ($release_date !== null) {
            $prepare .= ", release_date = :release_date";
            $executeRelease_date = ["release_date" => $release_date];
            $execute = array_merge($execute, $executeRelease_date);
        };
        if ($resume !== null) {
            $prepare .= ", resume = :resume";
            $executeResume = ["resume" => $resume];
            $execute = array_merge($execute, $executeResume);
        };
        if ($realisator !== null) {
            $prepare .= ", realisator = :realisator";
            $executeRealisator = ["realisator" => $realisator];
            $execute = array_merge($execute, $executeRealisator);
        };
        if ($actor !== null) {
            $prepare .= ", actor = :actor";
            $executeActor = ["actor" => $actor];
            $execute = array_merge($execute, $executeActor);
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
        $data->dataAction($prepare, $execute, Movie::class);
    }


    public static function deleteMovie($slug, $id)
    {
        $prepare = "DELETE FROM movie WHERE slug = :slug AND id = :id";
        $execute = 
        [
            'slug' => $slug,
            'id' => $id
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }

}