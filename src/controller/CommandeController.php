<?php
namespace Youcode\GestionLivreurs\controller;

use Youcode\GestionLivreurs\Service\CommandeService;


class CommandeController {
    private CommandeService $service;

    public function __construct(CommandeService $service){
        $this->service = $service;
    }

    public function create(array $data){
        SESSION_START();

        if(!isset($_SESSION['id'])){
            die("utilsateur non connecte");
        }
        $this->service->creeCommande($data, $_SESSION['id']);
        header("location: ../views/client/client.php");
        exit();
    }

}