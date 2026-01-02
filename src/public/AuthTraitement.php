<?php
require_once "../controller/AuthController.php";

class AuthTraitement {

    private AuthController $authController; 

    public function __construct(AuthController $authController){
        $this->authController = $authController;
    }


    public function traitement(strig $action,array $data): void {

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
    $authController = new AuthController();
    $traiter = new AuthTraitement($authController);
    $action = $_POST['action'] ?? '';
    $traiter->traitement($action, $_POST);
}