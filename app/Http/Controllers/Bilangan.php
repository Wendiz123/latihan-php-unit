<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;

class Bilangan extends Controller
{
    public function pecahan($angka)
    {
        
        return trim($this->terbilang($angka));
    }

    function terbilang($angkanya)
    {
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

        if(!is_numeric($angkanya))
        {
            throw new Exception("ERROR");
        }

        if ($angkanya==0)
            return ""; #1
        else if ($angkanya < 12)
            return " ".$huruf[$angkanya]; #1
        elseif ($angkanya < 20)
            return $this->terbilang($angkanya - 10) . " belas"; #1 + belas
        elseif ($angkanya < 100)
            return $this->terbilang($angkanya / 10) . " puluh" . $this->terbilang($angkanya % 10); #1 + puluh + #sisa10
        elseif ($angkanya < 200)
            return " seratus " . $this->terbilang($angkanya - 100); #seratus + 100-#1
        elseif ($angkanya < 1000)
            return $this->terbilang($angkanya / 100) . " ratus" . $this->terbilang($angkanya % 100); #1/100 + ratus + #sisa100
        elseif ($angkanya < 2000)
            return " seribu " . $this->terbilang($angkanya - 1000); #seribu + #1-1000
        elseif ($angkanya < 1000000)
            return $this->terbilang($angkanya / 1000) . " ribu" . $this->terbilang($angkanya % 1000); #1/1000 + ribu + #sisa1000
        elseif ($angkanya < 1000000000)
            return $this->terbilang($angkanya / 1000000) . " juta" . $this->terbilang($angkanya % 1000000); #1/1000000 + Juta + #sisa1000.000
        elseif ($angkanya >= 1000000000)
            return "Uang terlalu Besar";
    }


}
