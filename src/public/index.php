<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use Youcode\GestionLivreurs\controller\CommandeController;
use Youcode\GestionLivreurs\Repository\CommandeRepository;
use Youcode\GestionLivreurs\Service\CommandeService;

use Youcode\GestionLivreurs\controller\AuthController;
use Youcode\GestionLivreurs\Repository\AuthRepository;
use Youcode\GestionLivreurs\Service\AuthService;



$action = $_GET['action'] ?? 'home';

$commanderepo = new CommandeRepository();
$commandeService = new CommandeService($commanderepo);
$commandeController = new CommandeController($commandeService);

$authrepo = new AuthRepository();
$authService = new AuthService($authrepo);
$authcontroller = new AuthController($authService);




switch ($action) {

    case 'clientCommandes':
        $commandeController->TransformeListCommandesAuView();
        break;

    case 'commandeDetail':
        $controller = new CommandeController($commandeService);
        $controller->show((int)$_GET['id']);
        break;

    case 'deleteCommande':
        $controller = new CommandeController($commandeService);
        $controller->DeleteCommandeById($_GET['id']);
        break;

    case 'updateCommande':
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            die("Method not autorise .");
        }

        if(!isset($_POST['idCommande'])){
            die("acune id commande existe");
        }

        $controller = new CommandeController($commandeService);
        $controller->UpdateCommande((int)$_POST['idCommande'], $_POST);
        break;
    
    case 'profil':
        $controller = new AuthController($authService);
        $controller->showUserId();
        break;
        
    case 'notifications':
        require __DIR__ . '/../views/client/notifications.php';
        break;
    
    case 'profil':
            require __DIR__ . '/../views/client/profil.php';
            break;
            
    case 'updateProfile':
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            die("Method not autorise .");
        }

        $controller = new AuthController($authService);
        $controller->updateUser();
        break;


    default:
        require __DIR__ . '/../views/home.php';
        break;
}

 ?>




