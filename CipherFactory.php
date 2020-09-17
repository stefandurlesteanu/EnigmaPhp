<?php
include 'MorseCode.php';
include 'RailFence.php';
include 'ROT13.php';
include 'EnigmaException.php';


class CipherFactory
{

    public static function isCipherAvailable($cipherName)
    {
        if (in_array($cipherName, ['rot13', 'rail-fence', 'morse', null] ,false))
        {
            return true;
        }

        return false;
    }

    public static function getCipherForArgs($argsParser)
    {
        try {
            //return an appropriate Cipher Object or throw EnigmaException if cipher not available
            if (self::isCipherAvailable($argsParser['cipher'])) {
                switch ($argsParser['cipher']) {
                    case 'rot13':
                        return new ROT13();
                    case 'rail-fence':
                        return new RailFence();
                    case 'morse':
                        return new MorseCode();
                    default:
                        throw new EnigmaException('NULL');
                }
            }
            throw new EnigmaException($argsParser['cipher']);
        } catch (EnigmaException $e){
            echo $e->wrongCipherCode();
        }
        return null;
    }
}