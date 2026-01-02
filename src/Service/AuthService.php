<?php
require_once '../Repository/AuthRepository';

class AuthService {
    //
    private AuthRepository $authrepository;

    public function __construct(AuthRepository $authrepository){
        $this->authrepository = $authrepository;
    }

    public function login(string $email, string $password):?Utilisateur {
        //
        $user = $authrepository->getUserByEmail($email);

        if(!$user){
            return null;
        }
        $this->ValidateEmail($user->getEMail());

        if(!$user->isActif()){
            return null;
        }
        if(password_verify($password, $user->GetPassword())){
            return $user;
        }
        return null;
    }
    public function register(string $nom, string $prenom, string $email, string $role){
        $user = $authrepository->getUserByEmail($email);
        $this->ValidateIsEmpty([$nom, $prenom, $email, $role]); 
        $this->ValidateEmail($email);
        
        if($user){
            throw new ExceptionExists("ce email deja existe ");
        }
        $newuser = new Utilisateur();
        
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
}