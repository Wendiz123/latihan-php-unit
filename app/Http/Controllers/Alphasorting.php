<?php
/**
 * Created by PhpStorm.
 * User: wendi
 * Date: 11/01/16
 * Time: 15:11
 */

namespace App\Http\Controllers;


class Alphasorting {
    public function sorter($string)
    {
        if(preg_match('/[^a-zA-Z\s-]/i',$string)){
            abort(404, "Inputan Salah");
        }
        $sortnya = count_chars($string,3);
        return trim($sortnya);
    }
}