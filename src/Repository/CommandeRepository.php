<?php
namespace Youcode\GestionLivreurs\Repository;

use Youcode\GestionLivreurs\config\Database;


class CommandeRepository {

    public function __construct(){
        $this->db = Database::connect();
    }

    public function create(Commande $commande, int $ClientId): bool {

        $sql = "INSERT INTO commandes (titreCommande,descriptionCommande,adresseDepart,adresseArrive,statut,id_client)
        VALUES (:titre,:description,:depart,:arrivee,:statut,:id_client)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":titre" => $commande->getTitreCommande(),
            ":description" => $commande->getDescriptionCommande(),
            ":depart" => $commande->getAddresseDepart(),
            ":depart" => $commande->getAdresseArrive(),
            ":statut" => $commande->getStaut(),
            ":id_client" => $ClientId
        ]);
    }



}