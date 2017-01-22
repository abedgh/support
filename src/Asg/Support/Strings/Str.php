<?php
/**
 * Created by PhpStorm.
 * User: abed
 * Date: 1/22/17
 * Time: 7:02 PM
 */

namespace Asg\Support\Strings;

class Str {

    protected $encoding = 'UTF-8';
    protected $value = '';
    /**
     * @param string $value;
     * */
    function __construct($value = ''){
        $this->value = $value;
    }
    /**
     * @param string $value ;
     * @return Str;
     */
    public static function make($value){
        return new static($value);
    }

    /**
     * @return int;
     * */
    public function length(){
        if (function_exists('mb_strlen')){
            return mb_strlen($this->value,$this->encoding);
        }
        return strlen($this->value);
    }
    /**
     * @return Str;
     */
    public function trim(){
        $this->value = trim($this->value);
        return $this;
    }
    /**
     * @return string;
     * */
    public function value(){
        return $this->value;
    }
    /**
     * @return array;
     * */
    public function toCharArray(){
        return str_split($this->value,1);
    }
    /**
     * @param int $multiplier;
     * @return Str;
     * */
    public function repeat($multiplier){
        if (is_numeric($multiplier) && $multiplier> 0) {
            $this->value = str_repeat($this->value, $multiplier);
        }
        return $this;
    }
    /**
     * @return Str;
     * */
    public function upper(){
        $this->value = strtoupper($this->value);
        return $this;
    }
    /**
     * @return Str;
     * */
    public function lower(){
        $this->value = strtolower($this->value);
        return $this;
    }
}