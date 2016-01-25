    <?php
    #error_reporting(E_ALL ^ E_NOTICE);
    /*
    |--------------------------------------------------------------------------
    | Routes File
    |--------------------------------------------------------------------------
    |
    | Here is where you will register all of the routes in an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('timetostring/{id}','TimeToString@waktu');

    #Route::get('/timetostring/{time}', function ($time) {

#    });

    Route::get('/calculator','Calculator@index');
    Route::get('/calculator/form',function(){
        return view('form_calculator');
    });
    Route::post('/calculator','Calculator@index');

    #Route::get('/calculator/hitung/{angka}', function ($angka) {

#        preg_match('/^[0-9\(\)\+\-\*\/(sqrt)(pow),\s+]+$/', $angka,$ok);
 #       if (isset($ok[0])){
  #          return @eval("return ($angka);");
   #     }
    #    else
     #       return "ERROR";
   # });

    Route::get('/calculator/terbilang/{angka}', function ($angka) {

        $data= [
            "0" => "nol",
            "1" => "satu",
            "2" => "dua",
            "3" => "tiga",
            "4" => "empat",
            "5" => "lima",
            "6" => "enam",
            "7" => "tujuh",
            "8" => "delapan",
            "9" => "sembilan",
            "10" => "sepuluh"
        ];

        $awal = ''; $hasil='';$akhir='';
        if($angka>100)
        {
            $awal = "seratus ";
            $angka = $angka-100;
        }
        $arrAngka = str_split($angka);


        for($i=0;$i<count($arrAngka);$i++)
        {
            if(count($arrAngka)>1 && $angka <100)
            {
                $data["0"] = 'puluh';
            }
            else if(count($arrAngka)>1 && $angka<19)
            {
                $data["1"] = '';
                $akhir ='belas';
            }

            if($angka==11)
                $hasil='sebelas';
            else if($angka==100)
                $hasil='seratus';
            else{
                $hasil.=$data[$arrAngka[$i]].' ';
            }
        }

        if($angka<100 && $angka!=11 && $arrAngka[1]!=0)
        {
            $b = explode(" ",$hasil);
            $hasil = $b[0].' puluh '.$b[1];
        }

        return $awal.$hasil.$akhir;

        #$a = new NumberFormatter("en",NumberFormatter::SPELLOUT);
        #return $a->format($angka);
    });


    Route::get('/calculator/terbilang2/{angka}', function ($angka) {

        $data= [
            "0" => "nol",
            "1" => "satu",
            "2" => "dua",
            "3" => "tiga",
            "4" => "empat",
            "5" => "lima",
            "6" => "enam",
            "7" => "tujuh",
            "8" => "delapan",
            "9" => "sembilan",
            "10" => "sepuluh",
            "100" => "seratus",
            "1000" => "seribu",
        ];

        $awal =''; $tengah =''; $akhir='';

        if($angka<12 || $angka==100 || $angka==1000)
        {
            $awal = $data[$angka];
        }
        else if($angka<20)
        {
            $angka = $angka-10;
            $awal = $data[$angka].' belas';
        }
        else if($angka>=20 && $angka<100)
        {
            $arrAngka = str_split($angka);
            $data['0'] = 'puluh';

            for($i=0;$i<count($arrAngka);$i++) {

                if(isset($arrAngka[$i+1]))
                    $awal .= $data[$arrAngka[$i]] . ' puluh ';
                else
                    $awal .= $data[$arrAngka[$i]];
            }
        }

        return $awal.$tengah.$akhir;

        #$a = new NumberFormatter("en",NumberFormatter::SPELLOUT);
        #return $a->format($angka);
    });

    Route::get('/calculator/hurufcuy/{huruf}', function ($huruf) {
        if (preg_match('/[0-9]+/', $huruf))
            return 'Error';
        else
        {
            $a = str_split($huruf);
            $b=array_unique($a);
            sort($b);

            foreach($b as $data)
                echo $data;
        }
    });

    Route::get('/calculator/terbilang3/{angka}', function ($angka) {

        $angkanya = $angka;
        function terbilang($angkanya)
        {
            $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
            if ($angkanya < 12)
                return $huruf[$angkanya]; #1
            elseif ($angkanya < 20)
                return terbilang($angkanya - 10) . "Belas "; #1 + belas
            elseif ($angkanya < 100)
                return terbilang($angkanya / 10) . " Puluh " . terbilang($angkanya % 10); #1 + puluh + #sisa10
            elseif ($angkanya < 200)
                return " seratus " . terbilang($angkanya - 100); #seratus + 100-#1
            elseif ($angkanya < 1000)
                return terbilang($angkanya / 100) . " Ratus " . terbilang($angkanya % 100); #1/100 + ratus + #sisa100
            elseif ($angkanya < 2000)
                return " seribu " . terbilang($angkanya - 1000); #seribu + #1-1000
            elseif ($angkanya < 1000000)
                return terbilang($angkanya / 1000) . " Ribu " . terbilang($angkanya % 1000); #1/1000 + ribu + #sisa1000
            elseif ($angkanya < 1000000000)
                return terbilang($angkanya / 1000000) . " Juta " . terbilang($angkanya % 1000000); #1/1000000 + Juta + #sisa1000.000
            elseif ($angkanya >= 1000000000)
                return "Uang terlalu Besar";
        }

    echo terbilang($angka);
    });


    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | This route group applies the "web" middleware group to every route
    | it contains. The "web" middleware group is defined in your HTTP
    | kernel and includes session state, CSRF protection, and more.
    |
    */

    Route::group(['middleware' => ['web']], function () {
        //
       # Route::get('/calculator/pencacah/{angka}','Calculator@pencacah');
    });

