<?php

class ExceptionExists extends Exception {

    public function GetExisteUserException(){
        echo "Exists Email " .$this->getMessage();
    }
}