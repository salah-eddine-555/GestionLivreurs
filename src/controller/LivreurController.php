<?php
namespace Youcode\GestionLivreurs\controller;

use Youcode\GestionLivreurs\Service\CommandeService;
use Youcode\GestionLivreurs\Service\OffreService;

class LivreurController {
    private CommandeService $service;
    private OffreService $offre;

    public function __construct(CommandeService $service, OffreService $offre){
        $this->service = $service;
        $this->serviceoffre = $offre;
    }

    public function listeCommandes(){
        $commandes   = $this->service->getAllCommandes();
        require __DIR__ . '/../views/livreur/livreur.php';
    }

    public function detailsCommande(int $id){
         $commande = $this->service->findCommandeParId($id); 
        $offres = $this->serviceoffre->detailsCommandeOffre($id);
        require __DIR__ . '/../views/livreur/commande-detail.php';

    }
    

}

