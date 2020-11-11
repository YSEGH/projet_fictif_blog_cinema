<?php

namespace App\Classe\Data;

use PDO;

class DataHelper {

    public $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=LFDPA;host=localhost:8889', 'root', 'root', [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                            ]);
    }

    public function recupTable($tableName, $limit, $offset, $className){
        $query = "SELECT * FROM $tableName";
        if($limit !== null){
            $query .= " LIMIT $limit";
        };
        if($offset !== null){
            $query .= " OFFSET $offset";
        };
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement -> fetchAll(PDO::FETCH_CLASS, $className);
        return $data;
    }

    public function recupRow($tableName, $columnName, $result, $className){
        $query = "SELECT * FROM $tableName WHERE $columnName = :columnName";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            'columnName' => $result
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $className);
        $data = $statement -> fetch();
        return $data;
    }



    public function many($movie){
        $query = "
                SELECT * 
                FROM movie_has_moviecategory 
                JOIN moviecategory ON movie_has_moviecategory.moviecategory_id = moviecategory.id
                WHERE movie_has_moviecategory.movie_id = {$movie->id}
                ";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $data = $statement -> fetchAll(PDO::FETCH_OBJ);  
        return $data;
    }
}