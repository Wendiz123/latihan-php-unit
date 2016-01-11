<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\Calculator;

class CalculatorTest extends TestCase
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

    public function testSum1()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("3 + 5");
        $this->assertEquals(8, $hasil);
    }

    public function testSum2()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("3+5+8");
        $this->assertEquals(16, $hasil);
    }

    public function testMin1()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("8-8");
        $this->assertEquals(0, $hasil);
    }

    public function testMin2()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("8-9");
        $this->assertEquals(-1, $hasil);
    }

    public function testSumMin()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("8-9+2");
        $this->assertEquals(1, $hasil);
    }

    public function testMulti1()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("3*5");
        $this->assertEquals(15, $hasil);
    }

    public function testMulti2()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("2+3*5");
        $this->assertEquals(17, $hasil);
    }

    public function testMulti3()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("(12+8)*2");
        $this->assertEquals(40, $hasil);
    }

    public function testDiv1()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("12/2");
        $this->assertEquals(6, $hasil);
    }

    public function testDivMin()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("8-12/2");
        $this->assertEquals(2, $hasil);
    }

    public function testDivFloat()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("5/2");
        $this->assertEquals(2.5, $hasil);
    }

    /**
     *
     */
    public function testAlphaNum1()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("a+9");
        $this->assertEquals("ERROR", $hasil);
    }

    /**
     *
     */
    public function testAlphaNum2()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("9+9+y");
        $this->assertEquals("ERROR", $hasil);
    }

    public function testAkar()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("sqrt(144)");
        $this->assertEquals(12, $hasil);
    }


    /**
     *
     */
    public function testKuadrat()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("pow(6,2)");
        $this->assertEquals(36, $hasil);
    }

    public function tesTerbilang()
    {
        $calc = new Calculator();
        $hasil = $calc->terbilang("1000");
        $this->assertEquals("", $hasil);
    }

    /**
     * @expectedException BindingResolutionException()
     */

    /*public function testDoubleOpr()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("3**8");
        $this->assertEquals("ERROR", $hasil);
    }*/

    /*public function testDoubleBracket()
    {
        $calc = new Calculator();
        $hasil = $calc->hitung("((2+6))*9");
        $this->assertEquals("ERROR", $hasil);
    } */
}
