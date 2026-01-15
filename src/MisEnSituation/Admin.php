<?php

namespace Youcode\GestionLivreurs\MisEnSituation;
use Youcode\GestionLivreurs\MisEnSituation\User;
use Youcode\GestionLivreurs\MisEnSituation\Livre;

class Admin extends User {
    private int $id;

    public function __construct(string $nom,string $prenom, string $email,string $passord){
        parent::__construct($nom, $prenom, $email,$passord);
    }


    public function AjouterLivre(Livre $livre){
        //
    }


}