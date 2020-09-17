<?php


class EnigmaException extends Exception
{
    public function wrongOption() {
        //error message
        return "\033[31;1;4m". ucfirst($this->getMessage())." is not a valid option.\n\n" . "\033[0m" ;
    }

    public function fileError() {
        //error message
        return "\033[31;1;4m". ucfirst($this->getMessage()).".\n\n" . "\033[0m";
    }

    public function wrongCipher() {
        if ($this->getMessage() === "NULL"){
            return "\033[31;1;4m".'Cipher can not be ' .ucfirst($this->getMessage()). ".\n\n" . "\033[0m" ;
        }

        if ($this->getMessage() === "requires a key!"){
            return "\033[31;1;4m". "This cipher " .$this->getMessage()."\n\n" . "\033[0m" ;
        }
        //error message
        return "\033[31;1;4m". ucfirst($this->getMessage())." is not a valid cipher.\n\n" . "\033[0m" ;
    }

    public function notEnoughArgs() {
        //error message
        return "\033[31;1;4m". ucfirst($this->getMessage())." arguments.\n\n" . "\033[0m" ;
    }
    //since no constructor is provided, it will inherit Exception's constructors. Note the difference from Java, where
    //constructors are not inherited !!!
}