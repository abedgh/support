<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/7/17
 * Time: 6:23 PM
 */

use Asg\Support\Arrays\Arr;

class ArraySupportTest extends PHPUnit_Framework_TestCase{

    /* --------------------------------------------------------------- */
    public function testCreateEmptyArray(){
        $emptyArray = [];
        $this->assertEquals(Arr::make($emptyArray)->all(),[]);
    }
    /* --------------------------------------------------------------- */
    public function testMapArray(){
        $array = ['1','2'];
        $this->assertEquals(Arr::make($array)->map(
            function($item){
                return "item:{$item}";
            })->all(),['item:1','item:2']);
    }
    /* --------------------------------------------------------------- */
    public function testTrimArray(){
        $array = [' far ',' bar'];
        $this->assertEquals(Arr::make($array)->trim()->all(),['far','bar']);
    }
    /* --------------------------------------------------------------- */
    public function testCountArray(){
        $array = [1,2,3];
        $this->assertEquals(Arr::make($array)->count(),3);
    }
    /* --------------------------------------------------------------- */
    public function testArrayMaths(){
        $array = [3,2,4];
        $this->assertEquals(Arr::make($array)->sum(),9);
        $this->assertEquals(Arr::make($array)->avg(),3);
        $this->assertEquals(Arr::make([])->avg(),0);
        $this->assertEquals(Arr::make($array)->max(),4);
        $this->assertEquals(Arr::make($array)->min(),2);
    }
    /* --------------------------------------------------------------- */
    public function testFirstLastElementsOfArray(){
        $array = [];
        $this->assertEquals(Arr::make($array)->first(),null);
        $this->assertEquals(Arr::make($array)->last(),null);
        $this->assertEquals(Arr::make($array)
            ->push(['1st item','2nd item','last item'])
            ->last(),'last item');
    }
    /* --------------------------------------------------------------- */
    public function testPushPopShiftArray(){
        $array = ['item 1','item 2','item 3','item 4','item 5'];
        $this->assertEquals(Arr::make($array)->pop(2)->all(),['item 1','item 2','item 3']);
        $this->assertEquals(Arr::make($array)->shift(6)->all(),[]);
    }
    /* --------------------------------------------------------------- */


}