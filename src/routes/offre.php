<?php

use Youcode\GestionLivreurs\controller\OffreController;
use Youcode\GestionLivreurs\Service\OffreService;
use Youcode\GestionLivreurs\Repository\OffreRepository;

// Initialisation du repository, service et controller
$repo = new OffreRepository();
$service = new OffreService($repo);
$controller = new OffreController($service);


switch($action){
    
    case 'offre.creer':
        $controller->CreeOffre();
        break;
}