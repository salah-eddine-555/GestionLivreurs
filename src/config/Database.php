<?php

namespace Youcode\GestionLivreurs\config;
use PDO;
use PDOException;

class Database {

    public static function connect(){

        try{
            $conn = new PDO('mysql:host=localhost;dbname=Livraison', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            return $conn;
        }catch(PDOException  $e){
            Die("erreur lorsque la connexion au base de donnee : " . $e->getMessage());
        }
    }
}