<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Calculator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #dd($_POST);
        $str = $request->input('hitung');

        $operand = array("+", "-", "*", "/");

        if(preg_match("/[^0-9+\-*\/()(sqrt)(pow), ]+/", $str))
            abort(404, "invalid input");

        $hitung = preg_replace("/[^0-9+\-*\/()(sqrt)(pow), ]+/", "", $str);

        $split = str_split($hitung);

        #cek dua atau lebih operand bersebelahan
        for($i=0;$i<count($split);$i++) {
            if(in_array($split[$i],$operand) and in_array($split[$i+1],$operand)) {
                if($split[$i+1] == "-" and is_numeric($split[$i+2]))
                    continue;
                else
                    abort(404, "invalid input");
            }
        }

        #$hasil = create_function("", "return ($hitung);");
        $hasil = eval("return ($hitung);");

        if(!$hasil)
            abort(404, "invalid input");

        return view('calculator', ['hasil'=>$hasil]);

    }

    public function form()
    {
        /*if(!isset($_POST['btn']))
        {
            $hasil = '';
        }
        else
        {
            $angka1 = $_POST['angka1'];
            $operator = ($_POST['operator']=='+')?"%2B":$_POST['operator'];
            $angka2 = $_POST['angka2'];
            $hasil = file_get_contents("http://localhost:8000/calculator?hitung=".$angka1.$operator.$angka2);
        }*/

        return view('form_calculator');
    }

    public function hitung($str)
    {

        $operand = array("+", "-", "*", "/");

        if(preg_match("/[^0-9+\-*\/()(sqrt)(pow), ]+/", $str))
            abort(404, "invalid input");

        $hitung = preg_replace("/[^0-9+\-*\/()(sqrt)(pow), ]+/", "", $str);

        $split = str_split($hitung);

        #cek dua atau lebih operand bersebelahan
        for($i=0;$i<count($split);$i++) {
            if(in_array($split[$i],$operand) and in_array($split[$i+1],$operand)) {
                if($split[$i+1] == "-" and is_numeric($split[$i+2]))
                    continue;
                else
                    abort(404, "invalid input");
            }
        }

        #$hasil = create_function("", "return ($hitung);");
        $hasil = eval("return ($hitung);");

        if(!$hasil)
            abort(404, "invalid input");

        return $hasil;
    }
}