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

    public static function getMovieHomepage($place)
    {
        $prepare = "SELECT * FROM movie WHERE place = :place";
        $execute = 
        [
            'place' => $place
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Movie::class);
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

    private static function deleteOldPlace($place){
        $prepare = "UPDATE movie SET place = :oldplace WHERE place = :place";
        $execute = 
        [
            'oldplace' => 0,
            'place' => $place
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);       
    }

    public static function changePlace($id, $place)
    {
        self::deleteOldPlace($place);
        $prepare = "UPDATE movie SET place = :place WHERE id = :id";
        $execute = 
        [
            'id' => $id,
            'place' => $place
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);
    }

    public static function updateMovie($slug, $id, $name, $release_date, $resume, $realisator, $actor, $photo)
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
        $prepare .= " WHERE slug = :slug AND id = :id";
        $data = new DataHelper;
        $data->dataAction($prepare, $execute, Movie::class);
    }

    public static function addCategory($id_movie, $id_category){
        $prepare = "INSERT INTO movie_has_moviecategory (movie_id, moviecategory_id) VALUE (:movie_id, :moviecategory_id)";
        $execute = 
        [
            'movie_id' => $id_movie,
            'moviecategory_id' => $id_category
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);        
    }
    public static function deleteCategory($id_movie, $id_category){
        $prepare = "DELETE FROM movie_has_moviecategory WHERE movie_id = :movie_id AND moviecategory_id = :moviecategory_id";
        $execute = 
        [
            'movie_id' => $id_movie,
            'moviecategory_id' => $id_category
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute);        
    }

    public static function recupCategories($id){
        $prepare = "SELECT * 
                    FROM movie_has_moviecategory 
                    JOIN moviecategory ON movie_has_moviecategory.moviecategory_id = moviecategory.id
                    WHERE movie_has_moviecategory.movie_id = :id";
        $execute = 
        [
            'id' => $id
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Movie::class);
    }

    public static function recupProgramme($id){
        $prepare = "SELECT * 
                    FROM movie_has_programme 
                    JOIN programme ON movie_has_programme.programme_id = programme.id
                    WHERE movie_has_programme.movie_id = $id";
        $execute = 
        [
            'id' => $id
        ];
        $data = new DataHelper;
        return $data->recupData($prepare, $execute, Movie::class);
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