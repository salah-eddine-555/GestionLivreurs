<?php
namespace Youcode\GestionLivreurs\Service;

use Youcode\GestionLivreurs\Repository\OffreRepository;
use Youcode\GestionLivreurs\Entity\Offre;

class OffreService {
    private OffreRepository $repo;


    public function __construct(OffreRepository $repo){
        $this->repo = $repo;
    }

    public function  CreeOffre($prixOffre,$optionOffre,$typeVehicule,$dureeEstimee,$idCommande,$idLivreur){
            $this->ValidateIsEmpty([$prixOffre,$optionOffre,$typeVehicule,$dureeEstimee,$idCommande,$idLivreur]);

            $offre = new Offre(
                null,
                $prixOffre,
                $optionOffre,
                $typeVehicule,
                $dureeEstimee,
                $idCommande,
                $idLivreur
            );

            $this->repo->createOffre($offre);

    }

    private function ValidateIsEmpty(array $data): void {
            foreach($data as $key){
                if(empty($key)){
                    throw new EmptyException("Empty data");
                }
            }
    }




}