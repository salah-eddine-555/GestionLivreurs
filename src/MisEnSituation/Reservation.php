<?php

namespace Youcode\GestionLivreurs\MisEnSituation;

use Youcode\GestionLivreurs\MisEnSituation\Livre;

use Youcode\GestionLivreurs\MisEnSituation\Database;
use Youcode\GestionLivreurs\MisEnSituation\Membre;


class Reservation {
    private int $id;
    private Date $dateDebut;
    private Date $dateFin;

    private Livre $livre;
    private Membre $membre;

    public function __construct(Date $dateDebut, Date $dateFin){
        $this->DateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->db = Database::connect();
    }

    public function getDateDebut():Date { return $this->dateDebut; }
    public function getDateFin():Date { return $this->dateFin; }

    public function setDateDebut($dateDebut):bool {$this->dateDebut = $dateDebut;}
    public function setDateFin($dateFin):bool {$this->dateFin = $dateFin;}

      // Jointures 2 tables

    public function NomMembreReserve(Membre $membre){
        $sql = "SELECT nom as nomMembre, * from Reservations R 
        JOIN Membre M ON 
        R.id == M.id 
        where M.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $membre['id']]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function DetailsReservation(){
        $sql = "SELECT nom as NomMembre, titre, nom as nomActeur FROM Reservations R
        JOIN Membre M ON
             M.id = R.id
        JOIN Livres L ON
             L.id = R.id
        JOIN Acteurs A ON
            A.id = R.id
        WHERE R.id = :id";
    }


}