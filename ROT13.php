<?php


class ROT13 implements Cipher
{
    public function decrypt($message)
    {
        // TODO: Implement decrypt() method.
    }

    public function encrypt($message)
    {
        $key = substr($message, 0, 1);
        $message = str_split(substr($message, 1));
        $encryptedMessage = '';
        foreach($message as $char){
            $L = ord($char);
            for($i = $L, $iter = 1; $iter <= $key; $iter++){
                if(!($L >= 65 && $L <= 90) && !($L >=97 && $L <= 122) ){break;}
                if($i + 1 === 91){
                    $i = 96;
                }
                if($i + 1 === 123){
                    $i = 64;
                }
                ++$i;

            }
            $encryptedMessage .= chr($i);
        }
        echo $encryptedMessage;
    }

}