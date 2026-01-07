<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Youcode\GestionLivreurs\Repository\CommandeRepository;

use Youcode\GestionLivreurs\Service\CommandeService;
use Youcode\GestionLivreurs\Controller\CommandeController;



if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $rep = new CommandeRepository();
    $service = new CommandeService($rep);
    $controller = new CommandeController($service);

    $controller->create($_POST);
}