<?php
namespace Youcode\GestionLivreurs\Exception;
use Exception;

class ExceptionExists extends Exception {

    public function GetExisteUserException(){
        echo "Exists Email " .$this->getMessage();
    }
}