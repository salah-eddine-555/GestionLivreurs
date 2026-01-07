<?php
namespace Youcode\GestionLivreurs\Exception;

class ExceptionInvalidRole extends Exception {

    public function getMessageInvalideRole(){
        return "EXCEPTION ROLE INVALIDE " .$this->getMessage();
    }
}