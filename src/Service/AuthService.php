<?php
// require_once '../Repository/AuthRepository.php';
require_once '../Exception/ValidateExceptionEmail.php';
require_once '../Exception/ExceptionInvalidRole.php';
require_once '../Exception/ExceptionExists.php';

use Youcode\GestionLivreurs\Repository\AuthRepository;
use Youcode\GestionLivreurs\abstruct\Utilisateur;


class AuthService {
    //
    private AuthRepository $authrepository;

    public function __construct(AuthRepository $authrepository){
        $this->authrepository = $authrepository;
    }

    public function login(string $email, string $password):?Utilisateur {
        //
        $this->ValidateIsEmpty([$email, $password]);
        $this->ValidateEmail($email);
        $user = $this->authrepository->getUserByEmail($email);

        if(!$user){
            return null;
        }   
        if(!$user->isActif()){
            return null;
        }
   
        if(password_verify($password, $user->getPassword())){
            return $user;
        }
        return null;
    }
        public function register(string $nom, string $prenom, string $email,string $password,string $confirmPassword,string $phone, string $role){
            
            $this->ValidateIsEmpty([$nom, $prenom, $email,$password,$phone, $role]); 
            $this->ValidateEmail($email);
            
            $user = $this->authrepository->getUserByEmail($email);
            
            if($user){
                throw new ExceptionExists("ce email deja existe ");
            }
            $this->validatePassword($password, $confirmPassword);
            $hasedPassword = password_hash($password,  PASSWORD_BCRYPT);
            switch($role){
            case 'client':
                    $newUser = new Client($nom, $prenom, $email, $hasedPassword,$phone, 1);
                    break;
                case 'livreur':
                    $newUser = new Livreur($nom, $prenom, $email, $hasedPassword,$phone,1);
                    break;
                case 'admin':
                    $newUser = new Admin($nom, $prenom, $email, $hasedPassword, $phone, 1);
                    break;
                default:
                    throw new ExceptionInvalidRole("invlide role");
            }

            $this->authrepository->save($newUser);

            return $newUser;
            
        }

        private function ValidateIsEmpty(array $data): void {
            foreach($data as $key){
                if(empty($key)){
                    throw new EmptyException("Empty data");
                }
            }
        }

        private function ValidateEmail(string $email): void{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new ValidateExceptionEmail("email non valide");
            }
        }

        private function validatePassword(string $password,string $confirmPassword): void{
            if($password !== $confirmPassword){
                throw new ValidatePassword('passwords not identique');
            }
        }
    }