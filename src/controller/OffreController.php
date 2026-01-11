<?php
namespace Youcode\GestionLivreurs\controller;

use Youcode\GestionLivreurs\Service\OffreService;



class OffreController {
    private OffreService $service;

    public function __construct(OffreService $service){
        $this->service = $service;
    }


    public function CreeOffre(){
        $prixOffre    = $_POST['prixOffre'];
        $optionOffre  = $_POST['optionOffre'];
        $typeVehicule = $_POST['typeVehicule'];
        $dureeEstimee = $_POST['dureeEstimee'];
        $idCommande   = (int) $_POST['idCommande'];
        $idLivreur    = (int) $_POST['id_livreur'];

        $this->service->CreeOffre($prixOffre,$optionOffre,$typeVehicule,$dureeEstimee,$idCommande,$idLivreur);
        header("Location: index.php?action=livreur.commandes");
        exit;
    }

    



}