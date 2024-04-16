<?php 

/**
 * Factory Design Pattern:
 * 
 * Involves two or more classes:
 * - Factory class: Contains methods with access logic.
 * - Other classes: Objects to be created by the factory.
 * 
 * The factory class encapsulates the object creation process:
 * - It contains methods that initialize and return instances of other classes.
 * - These methods may include logic to determine which class to instantiate based on parameters.
 * 
 * Usage:
 * - Create an instance of the factory class.
 * - Use the factory methods to indirectly create objects of other classes.
 * - Benefit from centralized object creation and decoupling of object instantiation logic.
 */

 class Soaps{
    private $color;
    private $name;

    public function __construct($name,$color){
        $this->name = $name;
        $this->color = $color;
    }

    public function getSoaps(){
        echo $this->name." is our best soap ::  color - ". $this->color;
    }
 }

 class SoapsFactory{
    
    static public function create($name,$color){
        $obj = new Soaps($name,$color);
        return $obj;
    }
 }

 $obj = SoapsFactory::create('lux','white');
 $obj->getSoaps();