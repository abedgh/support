<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/7/17
 * Time: 6:26 PM
 */

namespace Asg\Support\Arrays;

class Arr {

    /**
     * @var mixed[]
     * */
    protected $items = [];

    function __construct($items = []){
        $this->items = $items;
    }
    /**
     * @param mixed[] $item;
     * @return Arr;
     * */
    public static function make($item){
        return new static($item);
    }
    /**
     * @return mixed[];
     * */
    public function all(){
        return $this->items;
    }
    /**
     * @return int;
     * */
    public function count(){
        return count($this->items);
    }
    /**
     * @param callable $callable;
     * @return Arr;
     * */
    public function map(callable $callable){
        $this->items = array_map($callable,$this->items);
        return $this;
    }
    /**
     * @return Arr;
     * */
    public function trim(){
        $this->map(function($item){
            return trim($item);
        });
        return $this;
    }
    /**
     * @param mixed|array
     * @return Arr;
     * */
    public function push($items){

    }
    /**
     * @return mixed[];
     * */
    public function keys(){
        return array_keys($this->items);
    }
    /**
     * @return mixed[];
    */
    public function values(){
        return array_values($this->items);
    }
    /**
     * @param mixed $key;
     * @return boolean;
    */
    public function exists($key){
        return array_key_exists($key,$this->items);
    }
    /**
     * @return number;
    */
    public function sum(){
        return array_sum($this->items);
    }
    /**
     * @return number;
    */
    public function avg(){
        $count = $this->count();
        if ($count>0){
            return $this->sum()/$count;
        }
        //Throws new exceptions here
        return 0;
    }
    /**
     * @return number|null;
     * */
    public function min(){
        return Arr::make($this->items)->sort()->first();
    }
    /**
     * @return number|null;
     * */
    public function max(){
        return Arr::make($this->items)->sort()->last();
    }
    /**
     * @return Arr;
    */
    public function sort(){
        sort($this->items);
        return $this;
    }
    /**
     * @return mixed|null
    */
    public function first(){
        if ($this->count()> 0){
            return $this->items[0];
        }
        return null;
    }
    /**
     * @return mixed|null
     */
    public function last(){
        return end($this->items);
    }


    protected function isArray($item){
        return is_array($item);
    }
}