<?php

namespace Youcode\GestionLivreurs\MisEnSituation;
use Youcode\GestionLivreurs\MisEnSituation\User;
use Youcode\GestionLivreurs\MisEnSituation\Livre;
use Youcode\GestionLivreurs\MisEnSituation\Database;

class Admin extends User {
    private int $id;

   

    public function __construct(string $nom,string $prenom, string $email,string $passord){
        parent::__construct($nom, $prenom, $email,$passord);
        $this->db = Database::connect();
    }


    public function AjouterLivre(Livre $livre){
        //

        $sql = "INSERT INTO livres (titre) VALUES (:titre)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":titre" => $livre['titre']]);
        
    }

    public function ModifierLivre(Livre $livre){
        $sql = "UPDATE livres SET (titre = :titre) WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            [":titre" => $livre['titre'],
             ":id" => $livre['id']
            ]);
    }

    public function SupprimerLivre(int $id){

        $sql = 'DELETE from livres  WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id" => $id]);  
    }

    public function RechercherMembre(Membre $membre){
        $sql = "SELECT * FROM membres WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":id" => $membre['id']
        ]);
        return $stmt->fetch();
    }



}