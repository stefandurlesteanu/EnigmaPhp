<?php


class ROT13 implements Cipher
{
    public function decrypt($message)
    {
        $key = (int) explode('-', $message)[0];
        $message = str_split(explode('-', $message)[1]);
        $encryptedMessage = '';
        foreach($message as $char){
            $L = ord($char);
            for($i = $L, $iter = 1; $iter <= $key; $iter++){
                if(!($L >= 65 && $L <= 90) && !($L >=97 && $L <= 122) ){break;}
                if($i - 1 === 64){
                    $i = 123;
                }
                if($i -1 === 96){
                    $i = 91;
                }
                --$i;
            }
            $encryptedMessage .= chr($i);
        }
        echo $encryptedMessage;
    }

    public function encrypt($message)
    {
        $key = explode('-', $message)[0];
        $message = str_split(explode('-', $message)[1]);
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