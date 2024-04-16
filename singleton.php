<?php

/**
 * Must have private static variable
 * Must have private construct function 
 * Must have public static function
 */

 class Singleton{
    private static $instance = null;

    private function __construct(){
        echo __CLASS__. " object created for first time";
    }

    public static function callInstance(){
        if(self::$instance == null){
            self::$instance = new Singleton();
           return self::$instance;    
        }else{
            echo "Object cannot be created again";
        };
    }
 }

 $obj = Singleton::callInstance();
 print_r($obj);
 $obj = Singleton::callInstance();
 print_r($obj);