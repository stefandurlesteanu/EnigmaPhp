<?php


class ArgsParser
{
    public $option;
    public $cipher;
    public $file;
    public $key;


    public function __construct($args){
        try {
            if (count($args) > 4) {
                throw new EnigmaException("Too many");
            }

            if(count($args) === 2) {
                throw new EnigmaException("Not enough");
            }

            if(count($args) === 0  ){
                $this->option = null;
                $this->cipher =  null;
                $this->file = null;
                $this->key = null;
            } elseif(count($args) === 1) {
                $this->option = $args[0];
            } else {
                $this->option = $args[0] ;
                $this->cipher = $args[1] ;
                $this->file =  $args[2] ;
                $this->key = isset($args[3]) ? $args[3] : null;
            }
        } catch (EnigmaException $e){
            echo $e->notEnoughArgs();
        }

    }


    public function checkOption(){
        try{
            if (!in_array($this->option, ['-h', '-e', '-d', null], true)){
                throw new EnigmaException($this->option);
            }
        } catch (EnigmaException $e){
            echo $e->wrongOption();

        }
    }

}