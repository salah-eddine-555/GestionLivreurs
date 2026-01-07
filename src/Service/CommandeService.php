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

   
        private function ValidateIsEmpty(array $data): void {
            foreach($data as $key){
                if(empty($key)){
                    throw new EmptyException("Empty data");
                }
            }
        }
}