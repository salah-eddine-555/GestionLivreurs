<?php

namespace Youcode\GestionLivreurs\Entity;

    class Commande {
        private int $idCommande;
        private string $titreCommande;
        private string  $descriptionCommande;
        private string $AdresseDepart;
        private string $AdresseArrive;
        private string $statut;
        private bool $isDelete = false;
        private string $createdAt; 
        // // 
        // private array $offres = [];

        public function __construct(
            string $titreCommande, string $descriptionCommande,
            string $AdresseDepart, string $AdresseArrive)
            {   
    
                $this->titreCommande = $titreCommande;
                $this->descriptionCommande = $descriptionCommande;
                $this->AdresseDepart = $AdresseDepart;
                $this->AdresseArrive = $AdresseArrive;
                $this->statut = 'cree';
            }

            public function getIdCommande(): int { return $this->idCommande; }

            public function getTitreCommande(){ return $this->titreCommande; }

            public function getDescriptionCommande(){ return $this->descriptionCommande; }
            
            public function getAdresseDepart() { return $this->AdresseDepart; }
            public function getAdresseArrive() { return $this->AdresseArrive; }

            public function getStatut() { return $this->statut; }
            public function getCreatedAt(): string { return $this->createdAt; }
            // les actions de commande

            public function setId(int $id): void { $this->idCommande = $id; }
            public function setStatut(string $statut): void { $this->statut = $statut; }
            public function setCreatedAt(string $createdAt): void { $this->createdAt = $createdAt; }

    }