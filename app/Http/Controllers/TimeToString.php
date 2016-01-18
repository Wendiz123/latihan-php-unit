<?php
/**
 * Created by PhpStorm.
 * User: wendi
 * Date: 18/01/16
 * Time: 14:59
 */

namespace App\Http\Controllers;

use Mockery\CountValidator\Exception;
use Psy\Exception\ErrorException;

class TimeToString extends Controller {
    function waktu($time)
    {
        //Inisialisasi
        $waktu = '';
        $menitt = '';
        $prefix='jam ';

        if(preg_match('/[a-zA-Z]/i',$time)){
            throw new \Exception("salah");
        }

        //Tentukan Jam dan menit
        $time2 = explode(":",$time);

        try
        {
            $jam = (int)$time2[0];
            $menit = (int)$time2[1];
            $timer=(int)str_replace(":",'',$time);  //22:30  = 2230, 18:00 -> 1800

            $date = date('H:i',strtotime($waktu));    //22:33 22,33

            if(strlen($time2[1])==1)                    //2:2
                throw new \Exception('Input Salah');
            #echo $timer;

            //Ketentuan Waktu
            if($timer == 0 || $jam==0){
                $waktu = ' malam';
                $jam = 24;
            }
            else if($timer>=100 && $timer<=500)
                $waktu = ' subuh';
            elseif($timer>=501 && $timer<=1100)
                $waktu = ' pagi';
            elseif($timer>=1101 && $timer<=1400)
                $waktu = ' siang';
            elseif($timer>=1401 && $timer<=1800)
                $waktu = ' sore';
            elseif($timer>=1801 && $timer<=2359)
                $waktu = ' malam';
            elseif($timer>2359)                         //24:30. 25:00
                throw new \Exception("Input Salah");

            //Ketentuan jika > 12 siang
            if($timer>1200 || $timer==0 || $jam == 24)
                $jam = $jam-12;

            //Hitung Menit Cuy
            if($menit>59)
                throw new \Exception("Input Salah");
            else if($menit==30)
            {
                $prefix .='setengah ';
                $jam+=1;
            }
            else if($menit==15)
            {
                $menitt = ' seperempat';
            }
            else if($menit==45)
            {
                $menitt = ' kurang seperempat';
                $jam+=1;
            }
            else if($menit>0)
            {
                $menitt = ' lewat '.$this->terbilang($menit);
            }

            //echo $menit;


            return $prefix.$this->terbilang($jam).$menitt.$waktu;
        }
        catch(Exception $ex){
            return $ex;
        }

    }

    //Fungsi Terbilang
    function terbilang($angkanya)
    {
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

        if ($angkanya < 12)
            return $huruf[$angkanya]; #1
        elseif ($angkanya < 20)
            return $this->terbilang($angkanya - 10) . " belas"; #1 + belas
        elseif ($angkanya < 100)
            return $this->terbilang($angkanya / 10) . " puluh " . $this->terbilang($angkanya % 10); #1 + puluh + #sisa10
    }
}