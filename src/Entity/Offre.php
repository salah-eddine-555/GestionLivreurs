<?php

namespace Youcode\GestionLivreurs\Entity;

class Offre {
    private ?int $idOffre;
    private float $prixOffre;
    private string $optionOffre;       
    private string $typeVehicule;     
    private string $dureeEstimee;        
    private int $idCommande;
    private int $idLivreur;

    private array $livreurs = [];
    private array $commandes = [];

    public function __construct(
        ?int $idOffre,
        float $prixOffre,
        string $optionOffre,
        string $typeVehicule,
        string $dureeEstimee,
        int $idCommande,
        int $idLivreur
    ){
        $this->idOffre = $idOffre;
        $this->prixOffre = $prixOffre;
        $this->optionOffre = $optionOffre;
        $this->typeVehicule = $typeVehicule;
        $this->dureeEstimee = $dureeEstimee;
        $this->idCommande = $idCommande;
        $this->idLivreur = $idLivreur;
    }


    public function getIdOffre(): int { return $this->idOffre; }
    public function getPrixOffre(): float { return $this->prixOffre; }
    public function getOptionOffre(): string { return $this->optionOffre; }
    public function getTypeVehicule(): string { return $this->typeVehicule; }
    public function getDureeEstimee(): string { return $this->dureeEstimee; }
    public function getIdCommande(): int { return $this->idCommande; }
    public function getIdLivreur(): int { return $this->idLivreur; }

    public function setPrixOffre(float $prixOffre): void { $this->prixOffre = $prixOffre; }
    public function setOptionOffre(string $optionOffre): void { $this->optionOffre = $optionOffre; }
    public function setTypeVehicule(string $typeVehicule): void { $this->typeVehicule = $typeVehicule; }
}