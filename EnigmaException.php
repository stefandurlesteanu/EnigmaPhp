<?php


class EnigmaException extends Exception
{
    public function errorMessage() {
        //error message
        return  $this->getMessage().' is not a valid E-Mail address';
    }

    public function wrongCipherCode() {
        //error message
        return "\033[31;1;4m". ucfirst($this->getMessage())." is not a valid cipher.\n\n" . "\033[0m" ;
    }
    //since no constructor is provided, it will inherit Exception's constructors. Note the difference from Java, where
    //constructors are not inherited !!!
}