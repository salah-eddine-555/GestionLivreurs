<?php
namespace Youcode\GestionLivreurs\Repository;

use Youcode\GestionLivreurs\config\Database;
use Youcode\GestionLivreurs\Entity\Offre;
use PDO;

class OffreRepository {

    public function __construct(){
        $this->db = Database::connect();
    }


    public function createOffre(Offre $offre):void {
         $sql = "INSERT INTO offres 
                (prixOffre, optionOffre, typeVehicule, dureeEstimee, idCommande, id_livreur)
                VALUES (:prixOffre, :optionOffre, :typeVehicule, :dureeEstimee, :idCommande, :id_livreur)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':prixOffre'    => $offre->getPrixOffre(),
            ':optionOffre'  => $offre->getOptionOffre(),
            ':typeVehicule' => $offre->getTypeVehicule(),
            ':dureeEstimee' => $offre->getDureeEstimee(),  
            ':idCommande'   => $offre->getIdCommande(),
            ':id_livreur'   => $offre->getIdLivreur(),
        ]);
    }

}