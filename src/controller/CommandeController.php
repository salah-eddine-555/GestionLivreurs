<?php
namespace Youcode\GestionLivreurs\controller;

use Youcode\GestionLivreurs\Service\CommandeService;


class CommandeController {
    private CommandeService $service;

    public function __construct(CommandeService $service){
        $this->service = $service;
    }

    public function create(array $data){
      

        if(!isset($_SESSION['id'])){
            die("utilsateur non connecte");
        }
        $this->service->creeCommande($data, $_SESSION['id']);
        header("Location: /GestionLivreurs/src/public/index.php?action=clientCommandes");
        exit();
    }

     public function TransformeListCommandesAuView(): void
    {
    if (!isset($_SESSION['id'])) {
        die('Utilisateur non connecté');
    }

    $clientId = (int) $_SESSION['id'];
    $commandes = $this->service->getCommandesByClient($clientId);

    require __DIR__ . '/../views/client/client.php';
    }

    public function show(int $id){

    if(!isset($_SESSION['id'])){
        die("Utilisateur non connecter");
    }

    $commande = $this->service->findCommandeParId($id);

    require __DIR__ . '/../views/commandeDetails.php';
    }



}


// $clientId = (int) $_SESSION['id'];
// $commandes = $this->service->getCommandesByClient($clientId);
// var_dump($commandes);
// require __DIR__ . '/../views/client/client.php';