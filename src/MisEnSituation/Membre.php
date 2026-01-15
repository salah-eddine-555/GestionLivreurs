<?php
namespace Youcode\GestionLivreurs\MisEnSituation;

use Youcode\GestionLivreurs\MisEnSituation\User;


class Membre extends User {
    private int $id;

    private array $ListeReservation;

    public function __construct(string $nom,string $prenom, string $email,string $passord){
        parent::__construct($nom, $prenom, $email,$passord);
    }

   

}