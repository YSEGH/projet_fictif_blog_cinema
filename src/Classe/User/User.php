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

   public static function updateUser($username, $password, $phone, $email)
    {
        $prepare = "UPDATE user SET phone = :phone, email = :email WHERE username = :username AND password = :password";
        $execute = 
        [
            "username" => $username, 
            "password" => $password,
            "phone" => $phone, 
            "email" => $email
        ];
        $data = new DataHelper;
        $data->dataAction($prepare, $execute, User::class);
    }

}