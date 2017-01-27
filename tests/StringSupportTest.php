<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/22/17
 * Time: 7:04 PM
 */
use Asg\Support\Strings\Str;

class StringSupportTest extends PHPUnit_Framework_TestCase{


    function testCreateStrInstanceFromStaticMethod(){
        $this->assertInstanceOf('Asg\Support\Strings\Str',Str::make('any text'));
    }

    function testStringLength(){
        $this->assertEquals(8,Str::make('any text')->length());
    }

    function testTrimSpaces(){
        $this->assertEquals('any text',Str::make(' any text ')->trim()->value());
    }

    function testConvertToCharArray(){
        $this->assertEquals(['a','b','c'],Str::make('abc')->toCharArray());
    }

    function testRepeat10TimeString(){
        $this->assertEquals('a-a-a-a-a-a-a-a-a-a-',Str::make('a-')->repeat(10)->value());
    }

    function testUpperLowerCaseString(){
        $this->assertEquals('abc',Str::make('AbC')->lower()->value());
        $this->assertEquals('ABC',Str::make('AbC')->upper()->value());
    }
    /** @test*/
    function testSubstringMethod(){
        $this->assertEquals('oo',Str::make('foo')->subString(1)->value());
    }
    /** @test*/
    function testStringPosition(){
        $this->assertEquals(4,Str::make('foo bar far')->pos('bar'));
        $this->assertEquals(12,Str::make('foo bar far bar2')->pos('bar',5));
    }
    /** @test*/
    public function testReverseString(){
        $this->assertEquals('rab',Str::make('bar')->reverse()->value());
    }

}