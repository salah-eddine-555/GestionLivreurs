<?php
require_once '../config/Databse.php';
require_once '../abstruct/Utilisateur.php';


class AuthRepository {
    //
    private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getUserByEmail(string $email) :?Utilisateur{
        
        $sql  = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data){
            switch($data['role']){
                case 'client':
                    return new Client($data['nom'],$data['prenom'],$data['email'],$data['role']);
                case 'livreur':
                    return new Livreur($data['nom'],$data['prenom'],$data['email'],$data['role']);
                case 'admin':
                    return new Admin($data['nom'],$data['prenom'],$data['email'],$data['role']);
            }
        }
        return null;

    }

        

}