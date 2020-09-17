<?php

include("CipherFactory.php");
include("ArgsParser.php");



class Enigma
{
    public static $menu="Enigma Manual\n" .
    "Run options: [-h | -e | -d] {CipherName} {FileName} {EncryptionKey}\n" .
    "   -h : displays this menu; other arguments are ignored.\n" .
    "   -e : encrypt and display\n" .
    "   -d : decrypt and display\n" .
    "   CipherName      : cipher to use when encrypting/decrypting; [rot13, rail-fence, morse]\n" .
    "   FileName        : path to file to encrypt/decrypt\n" .
    "   EncryptionKey   : Optional -> must be provided if cipher requires a key";

    public static function readFile($key, $file){
        $message = ''. $key;
        $fileX = fopen($file, 'rb') or die("Unable to open file!");
        // Output one character until end-of-file
        while(!feof($fileX)) {
            $message .= fgets($fileX);
        }
        fclose($fileX);
        return $message;
    }




    public static function handleCipherOperation($argsParser) {
        $args = (array) $argsParser;
        $argsParser->checkOption();

        if ($args ['option'] === '-h' || count(array_filter($args)) === 0 ){
            echo 'Outside Factory';
            echo self::$menu;
        } else {
            $cipher = CipherFactory::getCipherForArgs($args);
            if ($cipher === null ){
                echo self::$menu;
                die();
            }
            if($argsParser->checkFile($args['file'])){
                $key = isset($args['key']) ? $args['key'] : '';
                $message =  self::readFile($key, $args['file']);
                if ($args['option'] === '-d'){
                    $cipher->decrypt($message);
                } elseif ($args['option'] === '-e'){
                    $cipher->encrypt($message);
                }

            } else { echo "Due";}



        }

        // use cipher and display result or display menu if no args or wrong args provided
    }

}


//do not modify this code, but please understand it :)
$args=array_slice($argv,1);
$argsParser=new ArgsParser($args);
Enigma::handleCipherOperation($argsParser);
