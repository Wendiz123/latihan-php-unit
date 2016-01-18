<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\TimeToString;

class TimeToStringtest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test1()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("14:00");
        $this->assertEquals("jam dua siang", $terbilang);
    }
    public function test2()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("11:00");
        $this->assertEquals("jam sebelas pagi", $terbilang);
    }
    public function test3()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("18:00");
        $this->assertEquals("jam enam sore", $terbilang);
    }
    public function test4()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("05:00");
        $this->assertEquals("jam lima subuh", $terbilang);
    }
    /*public function test5()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("24:00");
        $this->assertEquals("jam dua belas malam", $terbilang);
    }*/
    public function test6()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("13:30");
        $this->assertEquals("jam setengah dua siang", $terbilang);
    }
    public function test7()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("11:15");
        $this->assertEquals("jam sebelas seperempat siang", $terbilang);
    }
    public function test8()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("12:45");
        $this->assertEquals("jam satu kurang seperempat siang", $terbilang);
    }
    public function test9()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("05:30");
        $this->assertEquals("jam setengah enam pagi", $terbilang);
    }
    public function test10()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("10:45");
        $this->assertEquals("jam sebelas kurang seperempat pagi", $terbilang);
    }
    public function test11()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("07:15");
        $this->assertEquals("jam tujuh seperempat pagi", $terbilang);
    }
    public function test12()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("15:30");
        $this->assertEquals("jam setengah empat sore", $terbilang);
    }
    public function test13()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("16:15");
        $this->assertEquals("jam empat seperempat sore", $terbilang);
    }
    public function test14()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("14:45");
        $this->assertEquals("jam tiga kurang seperempat sore", $terbilang);
    }
    public function test15()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("01:30");
        $this->assertEquals("jam setengah dua subuh", $terbilang);
    }
    public function test16()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("04:45");
        $this->assertEquals("jam lima kurang seperempat subuh", $terbilang);
    }
    public function test17()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("03:15");
        $this->assertEquals("jam tiga seperempat subuh", $terbilang);
    }
    public function test18()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("20:30");
        $this->assertEquals("jam setengah sembilan malam", $terbilang);
    }
    public function test19()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("22:15");
        $this->assertEquals("jam sepuluh seperempat malam", $terbilang);
    }
    public function test20()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("23:45");
        $this->assertEquals("jam dua belas kurang seperempat malam", $terbilang);
    }
    public function test21()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("00:01");
        $this->assertEquals("jam dua belas lewat satu malam", $terbilang);
    }
    public function test22()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("00:59");
        $this->assertEquals("jam dua belas lewat lima puluh sembilan malam", $terbilang);
    }
    public function test23()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("18:01");
        $this->assertEquals("jam enam lewat satu malam", $terbilang);
    }
    public function test24()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("14:01");
        $this->assertEquals("jam dua lewat satu sore", $terbilang);
    }
    public function test25()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("00:00");
        $this->assertEquals("jam dua belas malam", $terbilang);
    }
    public function test26()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("11:01");
        $this->assertEquals("jam sebelas lewat satu siang", $terbilang);
    }
    public function test27()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("05:01");
        $this->assertEquals("jam lima lewat satu pagi", $terbilang);
    }
    public function test28()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("02:13");
        $this->assertEquals("jam dua lewat tiga belas subuh", $terbilang);
    }
    public function test29()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("21:31");
        $this->assertEquals("jam sembilan lewat tiga puluh satu malam", $terbilang);
    }

    public function test30()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("03:00");
        $this->assertEquals("jam tiga subuh", $terbilang);
    }

    /**
     * @expectedException Exception
     */
    public function testError1()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("21.31");
    }
    /**
     * @expectedException Exception
     */
    public function testError2()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("21,31");
    }
    /**
     * @expectedException Exception
     */
    public function testError3()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("1/2 1");
    }
    /**
     * @expectedException Exception
     */
    public function testError4()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("2:2");
    }
    /**
     * @expectedException Exception
     */
    public function testError5()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("20;20");
    }
    /**
     * @expectedException Exception
     */
    public function testError6()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("20:20:20");
    }
    /**
     * @expectedException Exception
     */
    public function testError7()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("20:60");
    }
    /**
     * @expectedException Exception
     */
    public function testError8()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("24:01");
    }
    /**
     * @expectedException Exception
     */
    public function testError9()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("25:00");
    }
    /**
     * @expectedException Exception
     */
    public function testError10()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("12 am");
    }
    /**
     * @expectedException Exception
     */
    public function testError11()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("12:00 pm");
    }
    /**
     * @expectedException Exception
     */
    public function testError12()
    {
        $jam = new TimeToString();
        $terbilang = $jam->waktu("9 lewat 1/4");
    }

}