<?php
namespace Youcode\GestionLivreurs\MisEnSituation;

use Youcode\GestionLivreurs\MisEnSituation\Auteur;
use Youcode\GestionLivreurs\MisEnSituation\Reservation;

class Livre {
    private int $id;
    private string $titre;

    private Auteur $auteur;
    private Reservation $reservation;

    public function __construct(string $titre){
        $this->titre = $titre;
    }

    public function getTitre():string { return $this->titre; }

    public function setTitre($titre):bool {$this->titre = $titre; }


}