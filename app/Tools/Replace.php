<?php 
namespace App\Tools;

class Replace{

    public static function change($find, $replace, $data){
        if(gettype($find) === "string" && gettype($replace) === "string")
            return static::stringToString($find, $replace, $data);
        if(gettype($find) === "array" && gettype($replace) === "string")
            return static::arrayToString($find, $replace, $data);
        if(gettype($find) === "array" && gettype($replace) === "array")
            return static::arrayToArray($find, $replace, $data);
        if(gettype($find) === "string" && gettype($replace) === "array")
            return static::arrayToArray($find, $replace, $data);
    }
    private static function stringToString($find, $replace, $data){
        return str_replace($find, $replace, $data);
    }
    private static function arrayToString($find, $replace, $data){
        foreach($find as $obj){
            if(strpos($obj, $data) !== false){
                return str_replace($obj, $replace, $data);
            }
        }
    }
    private static function stringToArray($find, $replace, $data){
        foreach($replace as $obj){
            $data = str_replace($find, $obj, $data);
        }
        return $data;
    }
    private static function arrayToArray($find, $replace, $data){
        foreach($find as $key => $obj){
            if(strpos($obj, $data) !== false){
                return str_replace($obj, $replace[$key], $data);
            }
        }
    }
}