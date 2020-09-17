<?php


class RailFence implements Cipher
{
    public function decrypt($message)
    {
        $key = (int)explode('-', $message)[0];
        $message = str_split(explode('-', $message)[1]);

        //Make Rail Matrix
        $bigArray = [];
        for($i = 0; $i <= $key; $i++)
        {
            for($j = 0, $jMax = count($message) ; $j < $jMax; $j++)
            {
                $bigArray[$i][$j] = "\n";
            }
        }

        $dirDown = null;
        $row = 0;
        $col = 0;

        for($i = 0, $iMax = count($message); $i < $iMax; $i++)
        {
            if($row === 0)
            {
                $dirDown = true;
            }
            if($row === $key - 1)
            {
                $dirDown = false;
            }

            $bigArray[$row][$col] = "*";
            ++$col;

            if($dirDown)
            {
                ++$row;
            } else {
                --$row;
            }

        }

        $index = 0;
        for($i = 0; $i < $key; $i++)
        {
            for($j = 0, $jMax = count($message) ; $j < $jMax; $j++ )
            {
                if(($bigArray[$i][$j] === "*") && ($index < count($message)))
                {
                    $bigArray[$i][$j] = $message[$index];
                    ++$index;
                }
            }
        }

        $result = '';
        $row = 0;
        $col = 0;

        for($i = 0, $iMax = count($message); $i < $iMax; $i++)
        {
            if($row === 0)
            {
                $dirDown = true;
            }
            if($row === $key - 1)
            {
                $dirDown = false;
            }

            if($bigArray[$row][$col] !== "*")
            {
                $result .= $bigArray[$row][$col];
                ++$col;
            }

            if($dirDown)
            {
                ++$row;
            } else {
                --$row;
            }
        }

        echo $result;
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