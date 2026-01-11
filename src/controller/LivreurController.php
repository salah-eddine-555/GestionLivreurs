<?php
namespace Youcode\GestionLivreurs\controller;

use Youcode\GestionLivreurs\Service\CommandeService;

class LivreurController {
    private CommandeService $service;

    public function __construct(CommandeService $service){
        $this->service = $service;
    }

    public function listeCommandes(){
        $commandes   = $this->service->getAllCommandes();
        require __DIR__ . '/../views/livreur/livreur.php';
    }

    public function detailsCommande(int $id){
         $commande = $this->service->findCommandeParId($id); 

        require __DIR__ . '/../views/livreur/commande-detail.php';

    }
    

}

