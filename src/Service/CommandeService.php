<?php
namespace Youcode\GestionLivreurs\Service;

use Youcode\GestionLivreurs\Entity\Commande;
use Youcode\GestionLivreurs\Repository\CommandeRepository;

use Youcode\GestionLivreurs\Exception\EmptyException;



class CommandeService {

    private CommandeRepository $repoCommande;

    public function __construct(CommandeRepository $repoCommande){
        $this->repoCommande = $repoCommande;
    }

    public function creeCommande(array $data, $ClientId){

        $this->ValidateIsEmpty([$data['titre'], $data['description']]);

        $commande = new Commande(
            $data['titre'],
            $data['description'],
            $data['adresseDepart'],
            $data['adresseArrivee'],
        );
        $this->repoCommande->create($commande, $ClientId);

    }

    
   public function getCommandesByClient(int $clientId): array
    {
        $rows = $this->repoCommande->findByClientId($clientId);
        $commandes = [];

        foreach ($rows as $row) {
            $commande = new Commande(
                $row['titreCommande'],
                $row['descriptionCommande'],
                $row['adresseDepart'],
                $row['adresseArrive']
            );

            $commande->setId((int) $row['idCommande']);
            $commande->setStatut($row['statut']);
            $commande->setCreatedAt($row['created_at']);

            $commandes[] = $commande;
        }

        return $commandes;
    }


    public function findCommandeParId(int $id): Commande {

    $commande = $this->repoCommande->findCommandeById($id);

    if(!$commande){
        echo "n'existe pas acune commande pour ce id ";
    }

    return $commande;
    }

    public function DeleteCommandeParId(int $id) {
        $commande = $this->repoCommande->SupprimerCommandeParId($id);
    }

    public function UpdateCommande($id, $titre,$description,$adresseDepart,$adresseArrivee) {

    $this->ValidateIsEmpty([$titre,$description,$adresseDepart,$adresseArrivee]);

    $this->repoCommande->ModifierCommande($id, $titre,$description,$adresseDepart,$adresseArrivee);

    }

    public function StatistiqueCommandesClient(int $clientId){
        return $this->repoCommande->getStatistiqueCommandesByClient($clientId);
    }


   
        private function ValidateIsEmpty(array $data): void {
            foreach($data as $key){
                if(empty($key)){
                    throw new EmptyException("Empty data");
                }
            }
        }
}