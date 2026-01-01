<?php

abstract class Utilisateur {
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;
    protected string $role;
    protected bool $actif;

    public function __construct(string $nom, string $prenom, string $email, string $password, string $role, bool $actif){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->actif = $actif;
    }

    public function getEmail(){ return $this->email ;}
    public function getRole(){ return $this->role; }
    public function isActif(){ return $this->actif;}
}