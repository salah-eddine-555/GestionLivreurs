<?php
namespace Youcode\GestionLivreurs\abstruct;

abstract class Utilisateur {
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;
    protected string $phone;
    protected string $role;
    protected bool $actif;

    public function __construct(string $nom, string $prenom, string $email, string $password,string $phone, string $role, bool $actif){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->role = $role;
        $this->actif = $actif;
    
    }

      public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
   

    public function getNom(){ return $this->nom; }
    public function getPrenom(){ return $this->prenom; }
    public function getPassword(){ return $this->password; }
    public function getEmail(){ return $this->email ;}
    public function getPhone(){return $this->phone; }
    public function getRole(){ return $this->role; }
    public function isActif(){ return $this->actif;}

}