<?php
namespace Youcode\GestionLivreurs\Service;


use Youcode\GestionLivreurs\Repository\AuthRepository;
use Youcode\GestionLivreurs\abstruct\Utilisateur;
use Youcode\GestionLivreurs\Exception\EmptyException;
use Youcode\GestionLivreurs\Exception\ExceptionExists;
use Youcode\GestionLivreurs\Exception\ValidateExceptionEmail;


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

        public function getUserId(int $id){
            return $this->authrepository->getUserById($id);
        }

        public function UpdateUser(int $id, array $data):void {
            $this->ValidateIsEmpty([$data]);
            $this->ValidateEmail($data['email']);

            $this->authrepository->updateUserInfo(
                $id,
                $data['nom'],
                $data['prenom'],
                $data['email'],
                $data['phone']
            );

            if(!empty($data['password'])){
                $this->validatePassword($data['password'], $data['confirmPassword']);

                $user = $this->authrepository->getUserById($id);

                if(!password_verify($data['ancienPassword'], $user['password'])){
                    die("le mote de passe incorrect");
                }

                $hasedPassword = password_hash($data['password'],  PASSWORD_BCRYPT);

                $this->authrepository->UpdatePassword($id, $hasedPassword);
            }
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