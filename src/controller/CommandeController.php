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
        die('Utilisateur non connecte');
    }

    $clientId = (int) $_SESSION['id'];
    
    $statistiques = $this->service->StatistiqueCommandesClient($clientId);
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

    public function DeleteCommandeById(int $id): bool {
        if(!isset($_SESSION['id'])){
            die('Utilisateur no conecte !');
        }
        $commande = $this->service->DeleteCommandeParId($id);

         header("Location: /GestionLivreurs/src/public/index.php?action=clientCommandes");
        exit();
    }

    public function UpdateCommande(int $id, $data) :void {

            if(!isset($_SESSION['id'])){
                die("Utilisatuer non connecte ");
            }

            $titre = trim($_POST['titre'] ?? '');
            $description = trim($data['description'] ?? '');
            $adresseDepart = trim($data['adresseDepart'] ?? '');
            $adresseArrivee = trim($data['adresseArrivee'] ?? '');

            $this->service->UpdateCommande($id, $titre,$description,$adresseDepart,$adresseArrivee);

            header("Location: /GestionLivreurs/src/public/index.php?action=clientCommandes");
            exit();
    }

    public function DashboardClient(){

    }

    // public function StatistiqueCommandesByClient(){

    //     if(!isset($_SESSION['id'])){
    //         die("utilisatuer non connecte");
    //     }

    //     $idClient = $_SESSION['id'];
    //     $statistiques = $this->service->StatistiqueCommandesClient($idClient);

    //     require __DIR__ . '/../views/client/client.php';
    // }



}


// $clientId = (int) $_SESSION['id'];
// $commandes = $this->service->getCommandesByClient($clientId);
// var_dump($commandes);
// require __DIR__ . '/../views/client/client.php';