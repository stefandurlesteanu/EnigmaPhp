<?php


class RailFence implements Cipher
{
    public function decrypt($message)
    {
        // TODO: Implement decrypt() method.
    }

    public function encrypt($message)
    {
        $pivot = 0;
        $key = (int)explode('-', $message)[0]-1;
        $message = str_split(explode('-', $message)[1]);
        $encryptedMessage = '';
        $bigArray = null;

        for ($i = 0; $i <= $key; $i++) {
            $bigArray[] = array();
        }

        while (count($message) > 0) {
            if ($pivot === 0) {
                for ($i = 0; $i < $key; $i++) {
                    $var = (array_shift($message));
                    $bigArray[$i][] = $var;
                    $pivot++;
                }
            }

            if ($pivot === $key) {
                for ($i = $pivot; $i >= 1; $i--) {
                    $var = (array_shift($message));
                    $bigArray[$i][] = $var;
                    --$pivot;
                }
            }
        }

        $bigArray = array_merge(...array_values($bigArray));
        echo implode($bigArray);
    }
}