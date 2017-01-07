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


    protected function isArray($item){
        return is_array($item);
    }
}