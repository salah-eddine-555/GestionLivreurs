<?php
namespace Youcode\GestionLivreurs\controller;
require_once __DIR__ . '/../../vendor/autoload.php';


use  Youcode\GestionLivreurs\Service\AuthService;

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
            
            $_SESSION['id'] = $user->getId();
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
            $_SESSION['id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['nom'] = $user->getNom();

           require __DIR__ . '/../views/connexion.php';
        }else {
            echo "Erreur lorsque de l'inscription ";
        }
    }

    public function Deconnexion(){

        session_unset();

        session_destroy();

        header("location: ../views/home.php");
        exit();
    }

    public function showUserId(){
        if(!isset($_SESSION['id'])){
            die("utilisatuer non connecter");
        }

        $id = (int)$_SESSION['id'];
        $user = $this->service->getUserId($id);
        
        require __DIR__ . '/../views/client/profil.php';
    }

    public function updateUser() {
        if(!isset($_SESSION['id'])){
            die("utilisatuer non connecter");
        }

        $id = $_SESSION['id'];

        $data = [
            'nom' => $_POST['nom']?? '',
            'prenom' => $_POST['prenom']?? '',
            'email' => $_POST['email']?? '',
            'phone' =>$_POST['phone']?? '',
            'phone' =>$_POST['phone']?? '',
            'ancienPassword' => $_POST['ancienPassword'] ?? '',
            'password' => $_POST['password'] ?? '',
            'confirmPassword' => $_POST['confirmPassword'] ?? ''
        ];

        $this->service->UpdateUser($id ,$data);
        header('location: index.php?action=profil');
        exit();
    }


    private function RedrectionParRole(string $role){

        switch($role){
            case 'admin':
                header('location: ../views/admin/layout.php');
                exit();
            case 'client':
                header('location: /GestionLivreurs/src/public/index.php?action=clientCommandes');
                exit();
            case 'livreur':
                header("location: /GestionLivreurs/src/public/index.php?action=livreur.commandes");
                exit();
            default :
                'Role invalide';
                exit();
        }
    }
}
