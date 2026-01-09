<?php
namespace Youcode\GestionLivreurs\Repository;

use Youcode\GestionLivreurs\config\Database;
use Youcode\GestionLivreurs\Entity\Commande;
use PDO;

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
            ":depart" => $commande->getAdresseDepart(),
            ":arrivee" => $commande->getAdresseArrive(),
            ":statut" => $commande->getStatut(),
            ":id_client" => $ClientId
        ]);
        return true;
    }

    public function findByClientId(int $clientId): array
    {
        $sql = "
            SELECT 
                idCommande,
                titreCommande,
                descriptionCommande,
                adresseDepart,
                adresseArrive,
                statut,
                isDelete,
                created_at
            FROM commandes
            WHERE id_client = :id_client
              AND isDelete = 0
            ORDER BY created_at DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id_client' => $clientId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findCommandeById(int $id):?Commande {

        $sql = "SELECT * FROM commandes where idCommande = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":id"=> $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$data){
            return null;
        }
        $commande = new Commande(
        $data['titreCommande'],
        $data['descriptionCommande'],
        $data['adresseDepart'],
        $data['adresseArrive'],
        $data['statut'],
        $data['created_at']
        );
        $commande->setId($data['idCommande']);
        $commande->setStatut($data['statut']);
        $commande->setCreatedAt($data['created_at']);
        return $commande;
        

    }
}



