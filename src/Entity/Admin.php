<?php
namespace Youcode\GestionLivreurs\Entity;

use Youcode\GestionLivreurs\abstruct\Utilisateur;

class Admin extends Utilisateur {


     public function __construct(string $nom,string $prenom,string $email,string $password,$phone, bool $actif){
        parent::__construct($nom,$prenom, $email,$password, $phone, 'admin', $actif);
    }
}