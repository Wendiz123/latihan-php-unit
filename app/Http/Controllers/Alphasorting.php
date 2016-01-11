<?php
/**
 * Created by PhpStorm.
 * User: wendi
 * Date: 11/01/16
 * Time: 15:11
 */

namespace App\Http\Controllers;


class Alphasorting {
    public function sorter($huruf)
    {
        $huruf = str_replace(" ","",$huruf);

        if (preg_match('/^[a-zA-Z]+$/', $huruf))
        {
            $a = str_split($huruf);
            $b = array_unique($a);
            sort($b);

            return implode("",$b);
        }
        else
            return 'Error';
    }
}