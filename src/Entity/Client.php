<?php
namespace Youcode\GestionLivreurs\Entity;


use Youcode\GestionLivreurs\abstruct\Utilisateur;

class Client extends Utilisateur {
    private array $notifications  = [];
    private array $commandes = [];

    public function __construct(string $nom,string $prenom,string $email,string $password, string $phone, bool $actif){
        parent::__construct($nom,$prenom, $email, $password,$phone, 'client', $actif);
    }

    // les actions  Client

}