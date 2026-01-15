<?php

namespace Youcode\GestionLivreurs\MisEnSituation;

use Youcode\GestionLivreurs\MisEnSituation\Livre;


class Reservation {
    private int $id;
    private Date $dateDebut;
    private Date $dateFin;

    private Livre $livre;

    public function __construct(Date $dateDebut, Date $dateFin){
        $this->DateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function getDateDebut():Date { return $this->dateDebut; }
    public function getDateFin():Date { return $this->dateFin; }

    public function setDateDebut($dateDebut):bool {$this->dateDebut = $dateDebut;}
    public function setDateFin($dateFin):bool {$this->dateFin = $dateFin;}


}