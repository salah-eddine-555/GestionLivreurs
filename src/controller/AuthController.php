<?php
require_once "../service/AuthService.php";

class AuthController {
    private AuthService $service;

    public function __construct(AuthService $service){
        $this->service = $service;
    }


    public function connexion(array $data){
        $email = $data['email'];
        $password = $data['password'];
        
        $user = $this->service->login($email, $password);

        if($user){
            session_start();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['nom'] = $user->getNom();

            header('location: dashboard.php'); // dashboard selon le role
            exit();
        }else {
            echo "email ou mote de passe incorrect  ";
        }
    }
    
    public function inscription(array $data){
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];

    }
}