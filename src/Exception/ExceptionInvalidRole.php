<?php

class ExceptionInvalidRole extends Exception {

    public function getMessageInvalideRole(){
        return "EXCEPTION ROLE INVALIDE " .$this->getMessage();
    }
}