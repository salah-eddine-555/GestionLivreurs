<?php


class EmptyException extends Exception {

    public function getExceptionVlidateEmail(){
        return "Exception EMPTY DATA " .$this->getMessage();
    }
}