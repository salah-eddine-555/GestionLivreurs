<?php
namespace Youcode\GestionLivreurs\Repository;

// require_once '../abstruct/Utilisateur.php';
// require_once '../Entity/Client.php';
// require_once '../Entity/Livreur.php';
// require_once '../Entity/Admin.php';

use Youcode\GestionLivreurs\abstruct\Utilisateur;
use Youcode\GestionLivreurs\Entity\Client;
use Youcode\GestionLivreurs\Entity\Livreur;
use Youcode\GestionLivreurs\Entity\Admin;

use Youcode\GestionLivreurs\config\Database;
use PDO;

class AuthRepository {
    // //
    // private PDO $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getUserByEmail(string $email) :?Utilisateur{
        
        $sql  = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data){
            switch($data['role']){
                case 'client':
                    $user = new Client($data['nom'],$data['prenom'],$data['email'], $data['password'],$data['phone'],(bool)$data['actif']);
                    $user->setId($data['id']);
                    return $user;
                case 'livreur':
                    $user = new Livreur($data['nom'],$data['prenom'],$data['email'], $data['password'],$data['phone'], (bool)$data['actif']);
                     $user->setId($data['id']);
                    return $user;
                case 'admin':
                    $user = new Admin($data['nom'],$data['prenom'],$data['email'], $data['password'],$data['phone'], (bool)$data['actif']);
                     $user->setId($data['id']);
                    return $user;
            }
        }
        return null;
    }
    public function save(Utilisateur $user){
        $nom  = $user->getNom();
        $prenom  = $user->getPrenom();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $phone = $user->getPhone();
        $role = $user->getRole();
        $actif = $user->isActif()? 1 : 0;

        $sql = "INSERT INTO utilisateurs (nom, prenom, email, password,phone, role, actif) VALUES
        (:nom,:prenom,:email,:password,:phone,:role,:actif)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':password' => $password,
            ':phone' => $phone,
            ':role' => $role,
            ':actif' => $actif
        ]);
    }
}