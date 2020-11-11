<?php
namespace App\Classe\FunctionHelper;

use DateTime;

class FunctionHelper{

    public static function convertCreatedAt($date)
    {
        return new DateTime($date);
    }
    
}