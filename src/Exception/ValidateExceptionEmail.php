<?php
namespace Youcode\GestionLivreurs\Exception;
use Exception;


class ValidateExceptionEmail extends Exception {

    public function getExceptionValidationEmail(){
        return "EXCEPTION EMAIL NOT VALIDE" . $this->getMessage();
    }
}