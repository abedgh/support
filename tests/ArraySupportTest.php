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

        $this->assertNull(Arr::make($array)->first());
        $this->assertNull(Arr::make($array)->last());
        $this->assertEquals('last item',
            Arr::make($array)
            ->push(['1st item','2nd item','last item'])
            ->last());
    }
    /* --------------------------------------------------------------- */
    public function testPushPopShiftArray(){
        $array = ['item 1','item 2','item 3','item 4','item 5'];
        $this->assertEquals(['item 1','item 2','item 3'],Arr::make($array)->pop(2)->all());
        $this->assertEquals([],Arr::make($array)->shift(6)->all());
    }
    /* --------------------------------------------------------------- */
    public function testConvertArray2Int(){
        $items = ['1',2,'foo'];
        $this->assertEquals([1,2,0],Arr::make($items)->toInt()->all());
    }
    /* --------------------------------------------------------------- */
    public function testMergeArrays(){
        $items = ['one','two'];
        $this->assertCount(5,Arr::make($items)->merge(['three','four','five'])->all());
        $this->assertEquals(['one','two','three'],Arr::make($items)->merge('three')->all());
    }
    /* --------------------------------------------------------------- */
    public function testArrayIteration(){

        Arr::make(['one','two'])->each(function($item,$key){
            var_dump($key.' - '.$item);
        });
    }
    /* --------------------------------------------------------------- */


}