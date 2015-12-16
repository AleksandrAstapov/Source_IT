<?php

class CVehicle {
  
  public $name;
  public $speed;
  
  public function __construct($name,$speed) {
    $this->name = $name;
    $this->speed = $speed;
  }
  
  public function getSpeed(){
    return "Скорость транспортного средства равна ".$this->speed;
  }
  
}

class CAirplane extends CVehicle {
  public $wing;
  
  public function __construct($name,$speed,$wing) {
    parent::__construct($name,$speed);
    $this->wing = $wing;
  }
  
  public function getSpeed(){
    return parent::getSpeed()." км/час";
  }
    
}

class CAuto extends CVehicle {
  public $wheels;
  
  public function __construct($name,$speed,$wheels) {
    parent::__construct($name,$speed);
    $this->wheels = $wheels;
  }
  
  public function getSpeed(){
    return parent::getSpeed()." км/час";
  }
  
}

class CShip extends CVehicle {
  public $displacement;
  
  public function __construct($name,$speed,$displacement) {
    parent::__construct($name,$speed);
    $this->displacement = $displacement;
  }
  
  public function getSpeed(){
    return parent::getSpeed()." узлов";
  }
  
}

$auto = new CAuto('audi',300,4);
$vehicle = new CVehicle('mazda',300);
$airplane = new CAirplane('Су-7Б',3000,2);
$ship = new CShip('Titanic',3000,300);

var_dump($vehicle);
var_dump($auto);
var_dump($airplane);
var_dump($ship);