<?php
namespace Youcode\GestionLivreurs\MisEnSituation;

class User {
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;

    public function __construct(string $nom, string $prenom, string $email, string $password){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
    }

    public function getNom():string { return $this->nom;}
    public function getPrenom():string { return $this->prenom;}
    public function getEmail():string { return $this->email;}
    public function getPassword():string { return $this->password;}
}