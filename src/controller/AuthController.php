<?php
require_once __DIR__ . '/../../vendor/autoload.php';
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

            $this->RedrectionParRole($user->getRole());
        }else {
            echo "email ou mote de passe incorrect  ";
        }
    }
    
    public function inscription(array $data){
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];
        $role = $data['role'];

        $user = $this->service->register($nom, $prenom,$email,$password, $confirmPassword,$phone,$role);
        if($user){
            session_start();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['nom'] = $user->getNom();

            $this->RedrectionParRole($user->getRole());
        }else {
            echo "Erreur lorsque de l'inscription ";
        }
         
    }

    private function RedrectionParRole(string $role){

        switch($role){
            case 'admin':
                header('location: ../views/admin/layout.php');
                exit();
            case 'client':
                header('location: ../views/client/client.php');
                exit();
            case 'livreur':
                header("location: ../views/livreur/livreur.php");
                exit();
            default :
                'Role invalide';
                exit();
        }
    }
}
