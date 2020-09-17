<?php
include 'Cipher.php';

class MorseCode implements Cipher
{
    public static $morseCode = array(
        "A" => ".-",
        "B" => "-...",
        "C" => "-.-.",
        "D" => "-..",
        "E" => ".",
        "F" => "..-.",
        "G" => "--.",
        "H" => "....",
        "I" => "..",
        "J" => ".---",
        "K" => "-.-",
        "L" => ".-..",
        "M" => "--",
        "N" => "-.",
        "O" => "---",
        "P" => ".--.",
        "Q" => "--.-",
        "R" => ".-.",
        "S" => "...",
        "T" => "-",
        "U" => "..-",
        "V" => "...-",
        "W" => ".--",
        "X" => "-..-",
        "Y" => "-.--",
        "Z" => "--..",
        "1" => ".----",
        "2" => "..---",
        "3" => "...--",
        "4" => "....-",
        "5" => ".....",
        "6" => "-....",
        "7" => "--...",
        "8" => "---..",
        "9" => "----.",
        "0" => "-----",
        " " => "/"
    );

    public function decrypt($message)
    {

        $decryptedMessage = '';
        $message = substr($message, 1);
        $message = explode(" ", $message);
        foreach ($message as $word){
            $decryptedMessage .= array_search($word, self::$morseCode, false);
        }
        echo $decryptedMessage;
    }

    public function encrypt($message)
    {
        $message = strtoupper($message);
        $encryptedMessage = '';
        $messageLength = strlen($message);
        for ($i = 0; $i < $messageLength; $i++){
            if(array_key_exists($message[$i], self::$morseCode)){
                $encryptedMessage .= self::$morseCode[$message[$i]] . " ";
            }
        }
        echo $encryptedMessage;
    }

}