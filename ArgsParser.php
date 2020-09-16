<?php


class ArgsParser
{
    public $option;
    public $cipher;
    public $file;
    public $key;


    public function __construct($args){
        if(count($args) === 0 ){
            $this->option = null;
            $this->cipher =  null;
            $this->file = null;
            $this->key = null;
        } else {
            $this->option = count($args) === 4 ? $args[0] : null;
            $this->cipher = $this->option ? $args[1] : $args[0];
            $this->file = $this->option ? $args[2] : $args[1];
            $this->key = $this->option ? $args[3] : $args[2];
        }
    }

}