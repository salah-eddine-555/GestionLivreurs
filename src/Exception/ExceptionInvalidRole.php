<?php
namespace Youcode\GestionLivreurs\Exception;
use Exception;

class ExceptionInvalidRole extends Exception {

    public function getMessageInvalideRole(){
        return "EXCEPTION ROLE INVALIDE " .$this->getMessage();
    }
}