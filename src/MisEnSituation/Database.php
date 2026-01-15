<?php


namespace Youcode\GestionLivreurs\MisEnSituation;
use PDO;

use PDOException;

class Database {

    public static function connect(){

        try{
            $conn = new PDO("mysql:host=localhost;dbname:TestBiblio", 'root', '');

            return $conn;
    }catch(PDOException $e){
        die('erreur lorsque la connexion');
    }
    }
}