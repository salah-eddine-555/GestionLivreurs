<?php
namespace Youcode\GestionLivreurs\Exception;
use Exception;

class EmptyException extends Exception {

    public function getExceptionVlidateEmail(){
        return "Exception EMPTY DATA " .$this->getMessage();
    }
}