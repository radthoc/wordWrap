<?php
namespace Kata\Tests;

use Kata\Adder;
use Kata\WordWrap;

class WordWrapTest extends \PHPUnit_Framework_TestCase
{

    private $string = '';
    private $lineColumns = 0;


    /**
     * @test
     */
    public function testNothing()
    {
        $this->assertTrue(true);
    }

    public function testStringShorterThanLineColumns()
    {
        $this->string = 'primera prueba';
        $this->lineColumns = 25;

        $expectedResult = $this->string;

        $this->assertEquals(
            $expectedResult,
            WordWrap::wrap($this->string, $this->lineColumns)
        );
    }

    public function testStringAsLongAsLineColumns()
    {
        $this->string = 'segunda prueba';
        $this->lineColumns = 14;

        $expectedResult = $this->string;

        $this->assertEquals(
            $expectedResult,
            WordWrap::wrap($this->string, $this->lineColumns)
        );
    }

    public function testReturnStringWithALineBreak()
    {
        $this->string = 'tercera prueba con salto de linea';
        $this->lineColumns = 17;

        $expectedResult = 'tercera prueba\ncon salto de linea';

        $this->assertEquals(
            $expectedResult,
            WordWrap::wrap($this->string, $this->lineColumns)
        );
    }

    public function testReturnStringWithSeveralLineBreaks()
    {
        $this->string = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultrices augue et turpis';
        $this->lineColumns = 15;

        $expectedResult = 'Lorem ipsum\ndolor sit amet,\nconsectetur\nadipiscing elit.\nDuis ultrices\naugue et turpis';

        $this->assertEquals(
            $expectedResult,
            WordWrap::wrap($this->string, $this->lineColumns)
        );
    }
}