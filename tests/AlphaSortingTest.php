<?php
/**
 * Created by PhpStorm.
 * User: wendi
 * Date: 11/01/16
 * Time: 15:14
 */

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\Alphasorting;

class AlphaSortingTest extends TestCase {
    public function testa1()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("wendi");
        $this->assertEquals("deinw", $hasil);
    }

    public function testDuaAplhaSama()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("imam");
        $this->assertEquals("aim", $hasil);
    }

    public function testSpasi()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("imam ramadhan");
        $this->assertEquals("adhimnr", $hasil);
    }

    public function testAlphaUpper()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("Imam Ramadhan");
        $this->assertEquals("IRadhmn", $hasil);
    }

    public function testAlphaNumeric()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("Imam Ramadhan123");
        $this->assertEquals("Error", $hasil);
    }

    public function testAlphaUpperLower()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("Imam RamAdhan");
        $this->assertEquals("AIRadhmn", $hasil);
    }

    public function testSpecChar()
    {
        $bil = new Alphasorting();
        $hasil = $bil->sorter("Imam@! RamAdhan4$");
        $this->assertEquals("Error", $hasil);
    }


}