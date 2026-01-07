<?php
namespace Youcode\GestionLivreurs\Entity;

use Youcode\GestionLivreurs\abstruct\Utilisateur;

class Livreur extends Utilisateur {
    private array $offres = [];
    private array $notifications = [];


     public function __construct(string $nom,string $prenom,string $email,string $password,string $phone, bool $actif){
        parent::__construct($nom,$prenom, $email,$password ,$phone,'livreur', $actif);
    } 
    // les actions Livreuer


}