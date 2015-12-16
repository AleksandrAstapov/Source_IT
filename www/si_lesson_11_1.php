<?php

class CAuto {
  
  private $name;
  private $model;
  private $speed;
  
  public function __construct($name,$model){
    $this->name = $name;
    $this->model = $model;
  }
  
  public function __get($name){
    return isset($this->$name) ? $this->$name : '';
  }
  
  public function __invoke(){
    echo 'invoke'.'<br>';
  }
  
  public function __isset($name){
    return isset($this->$name);
  }
  
  public function __set($name,$value){
    $this->$name = $value;
  }
  
  public function __toString() {
    return "Это автомобиль ".$this->name." - ".$this->model;
  }
  
  public function calcSpeedMS($s,$t){
    $speed = round($s/$t/3.6);
    $this->speed = $speed;
    $this->showResult('м/с');
  }
    
  public function calcSpeedKH($s,$t){
    $speed = round($s/$t);
    $this->speed = $speed;
    $this->showResult('км/час');
  }
  
  private function showResult($type){
    echo "Автомобиль ".$this->name." - ".$this->model." ехал со скоростью ".$this->speed.$type;
  }
  
}

class CVehicle{
  
  private $name;
  private $speed;
  
  public function __construct($name,$speed) {
    $this->name = $name;
    $this->speed = $speed;
  }
  
}

$bmw = new CAuto("BMW","E39");
$bmw->calcSpeedKH(100, 2);
echo '<br>';
/*
$bmw->calcSpeedMS(100, 2);
*/
$bmw();
echo $bmw->wheels,"<br>";
$bmw->wheels=4;
