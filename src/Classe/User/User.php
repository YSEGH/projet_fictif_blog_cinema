<?php

namespace App\Classe\User;

use App\Classe\Data\DataHelper;

class User {

    public $username;
    public $password;

    public function getAuth($username, $password)
    {
        $prepare = "SELECT * FROM user WHERE username = :username AND password = :password";
        $execute = ['username' => $username, 'password' => $password];
        $user = new DataHelper;
        $auth = $user->recupData($prepare, $execute, User::class);
        return $auth;
    } 

}