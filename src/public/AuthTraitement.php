<?php
require_once "../controller/AuthController.php";
require_once "../Service/AuthService.php";
// require_once "../Repository/AuthRepository.php";
use Youcode\GestionLivreurs\Repository\AuthRepository;

class AuthTraitement {

    private AuthController $authController; 

    public function __construct(AuthController $authController){
        $this->authController = $authController;
    }


    public function traitement(string $action,array $data): void {

        switch($action){
            case 'login':
                $this->authController->connexion($data);
                break;
            case "register":
                $this->authController->inscription($data);
                break;
        }
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $repo = new AuthRepository();
    $service = new AuthService($repo);
    $authController = new AuthController($service);
    $traiter = new AuthTraitement($authController);
    $action = $_POST['action'] ?? '';
    $traiter->traitement($action, $_POST);
}