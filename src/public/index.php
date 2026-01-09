<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use Youcode\GestionLivreurs\controller\CommandeController;
use Youcode\GestionLivreurs\Repository\CommandeRepository;
use Youcode\GestionLivreurs\Service\CommandeService;


$action = $_GET['action'] ?? 'home';

$commanderepo = new CommandeRepository();
$commandeService = new CommandeService($commanderepo);
$commandeController = new CommandeController($commandeService);

switch ($action) {

    case 'clientCommandes':
        $commandeController->TransformeListCommandesAuView();
        break;
    case 'commandeDetail':
        $controller = new CommandeController($commandeService);
        $controller->show((int)$_GET['id']);
        break;
    case 'notifications':
        require __DIR__ . '/../views/client/notifications.php';
        break;
    case 'profil':
            require __DIR__ . '/../views/client/profil.php';
            break;
    default:
        require __DIR__ . '/../views/home.php';
        break;
}
 ?>




