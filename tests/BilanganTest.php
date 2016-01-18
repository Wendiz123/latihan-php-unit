<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Bilangan;

class BilanganTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function atest1()
    {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan(5);
    	$this->assertEquals("lima", $hasil);
    }

    public function atest2()
    {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan(51);
    	$this->assertEquals("lima puluh satu", $hasil);
    }

    public function atest3()
    {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan(145);
    	$this->assertEquals("seratus empat puluh lima", $hasil);
    }

    public function atest4()
    {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan(1975);
    	$this->assertEquals("seribu sembilan ratus tujuh puluh lima", $hasil);
    }

    public function atest5()
    {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan(53456);
    	$this->assertEquals("lima puluh tiga ribu empat ratus lima puluh enam", $hasil);
    }

	/**
	 * @expectedException Exception
	 */
    public function testError1() {
    	$bil = new Bilangan();
    	$hasil = $bil->pecahan("3*6-abc");
    }

    public function test1()
    {
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(1);
		$this->assertEquals("satu",$terbilang);
	}

	public function test2()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(11);
		$this->assertEquals("sebelas",$terbilang);
	}

	public function test3()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(40);
		$this->assertEquals("empat puluh",$terbilang);
	}

	public function test4()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(100);
		$this->assertEquals("seratus",$terbilang);
	}

	/**
	 * @expectedException Exception
	 */
    public function test5()
    {
    	$angka = new Bilangan();
		$terbilang = $angka->pecahan("10a567");
    }

    public function test6()
    {
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(9999);
		$this->assertEquals("sembilan ribu sembilan ratus sembilan puluh sembilan",$terbilang);
	}


    public function test7()
    {
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(213789);
		$this->assertEquals("dua ratus tiga belas ribu tujuh ratus delapan puluh sembilan",$terbilang);
	}

    /**
	 * @expectedException Exception
	 */
    public function test8()
    {
    	$angka = new Bilangan();
		$terbilang = $angka->pecahan("00578900xxx");
    }

    /*public function test9()
    {
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(00756);
		$this->assertEquals("tujuh ratus lima puluh enam",$terbilang);
	}*/

	/**
	 * @expectedException Exception
	 */
    public function test10()
    {
    	$angka = new Bilangan();
		$terbilang = $angka->pecahan("2134 6789");
    }

    /**
	 * @expectedException Exception
	 */
    /*public function test11()
    {
    	$angka = new Bilangan();
		$terbilang = $angka->pecahan(100000000000);
    }

    public function test12()
    {
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(1010);
		$this->assertEquals("seribu sepuluh",$terbilang);
	}

	public function test13()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(19);
		$this->assertEquals("sembilan belas",$terbilang);
	}

	public function test14()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(68);
		$this->assertEquals("enam puluh delapan",$terbilang);
	}

	public function test15()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(301);
		$this->assertEquals("tiga ratus satu",$terbilang);
	}*/

	public function test16()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(512);
		$this->assertEquals("lima ratus dua belas",$terbilang);
	}

	public function test17()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(888);
		$this->assertEquals("delapan ratus delapan puluh delapan",$terbilang);
	}

	public function test18()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(1000);
		$this->assertEquals("seribu",$terbilang);
	}

	public function test19()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(1000000);
		$this->assertEquals("satu juta",$terbilang);
	}

	public function test20()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(700);
		$this->assertEquals("tujuh ratus",$terbilang);
	}

	public function test21()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(6000);
		$this->assertEquals("enam ribu",$terbilang);
	}

	public function test22()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(8002);
		$this->assertEquals("delapan ribu dua",$terbilang);
	}

	public function test23()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(3018);
		$this->assertEquals("tiga ribu delapan belas",$terbilang);
	}

    /*public function test24()
    {
        $angka = new Bilangan();
        $terbilang = $angka->pecahan(4111);
        $this->assertEquals("empat ribu seratus sebelas",$terbilang);
    }

    public function test25()
    {
        $angka = new Bilangan();
        $terbilang = $angka->pecahan(11111);
        $this->assertEquals("sebelas ribu seratus sebelas",$terbilang);
    }

    public function test26()
    {
        $angka = new Bilangan();
        $terbilang = $angka->pecahan(111111);
        $this->assertEquals("seratus sebelas ribu seratus sebelas",$terbilang);
    }

    public function test27()
    {
        $angka = new Bilangan();
        $terbilang = $angka->pecahan(1111111);
        $this->assertEquals("satu juta seratus sebelas ribu seratus sebelas",$terbilang);
    }*/

	/**
	 * @expectedException Exception
	 */
	public function test28()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(-2378);
	}

	/**
	 * @expectedException Exception
	 */
	public function test29()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("300,-");
	}

	/**
	 * @expectedException Exception
	 */
	public function test30()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("1.999");
	}

	/**
	 * @expectedException Exception
	 */
	public function test31()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("24,89");
	}

	/**
	 * @expectedException Exception
	 */
	public function test32()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("Rp 9999");
	}

	/**
	 * @expectedException Exception
	 */
	public function test33()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("$ 100");
	}

	/**
	 * @expectedException Exception
	 */
	public function test34()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("rp200.789,-");
	}

	/**
	 * @expectedException Exception
	 */
	public function test35()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("xxi");
	}

	/**
	 * @expectedException Exception
	 */
	public function test36()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("300k");
	}

	/**
	 * @expectedException Exception
	 */
	public function test37()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("@99%");
	}

	/**
	 * @expectedException Exception
	 */
	public function test38()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan("34/800");
	}

	public function test39()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(40009);
		$this->assertEquals("empat puluh ribu sembilan",$terbilang);
	}

	public function test40()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(70061);
		$this->assertEquals("tujuh puluh ribu enam puluh satu",$terbilang);
	}

	public function test41()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(30333);
		$this->assertEquals("tiga puluh ribu tiga ratus tiga puluh tiga",$terbilang);
	}

	public function test42()
	{
		$angka = new Bilangan();
		$terbilang = $angka->pecahan(59876);
		$this->assertEquals("lima puluh sembilan ribu delapan ratus tujuh puluh enam",$terbilang);
	}
}
