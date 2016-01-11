<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Calculator extends Controller
{
    public function hitung($angka)
    {
        preg_match('/^[0-9\(\)\+\-\*\/(sqrt)(pow),\s+]+$/', $angka,$ok);
        if (isset($ok[0])){
            return @eval("return ($angka);");
        }
        else
            return "ERROR";
    }

}
