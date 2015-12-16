<?php

/*
 * Рассчитать скорость движения машины и вывести её в удобочитаемом виде. 
 * Осуществить возможность вывода в км/ч, м/c.
 * Исходные данные: Пройденный путь - S; Время движения - t.
 * 
 * С применением ООП. В классе обязательно должен быть конструктор.
 * Должны быть поля:
 * Название автомобиля,
 * Максимальная скорость,
 * Тип кузова,
 * Количество колес.
 * 
 * Методы которые изменяют или получают значения этих полей.
 * Метод который проводит расчет.
 * метод который выводит результат на экран.
 */

class CCar {
  
  private $bodyType;    // Тип кузова
  private $carName;     // Название автомобиля
  private $maxSpeed;    // Максимальная скорость
  private $wheelsCount; // Количество колес
  
  protected $distance;
  protected $time;
  protected $rusUnits = array(
      'kmh' => 'км/час',
      'ms' => 'м/с'
      );
  protected $speed;
  protected $speedUnits;
  
  public function __construct() {
    $this->distance = filter_input(0, 'distance');
    $this->time = filter_input(0, 'time');
    $this->speedUnits = filter_input(0, 'speedUnits');
  }
  
  public function __get($property) {
    $method = "get".ucfirst($property);
    if (method_exists($this, $method)){
      return $this->$method();
    }
    return $this->$property;
  }
  
  public function __set($property, $val) {
    $method = "set".ucfirst($property);
    if (method_exists($this, $method)){
      $this->$property = $method($val);
    } else {
      $this->$property = $val;
    }
  }
  
  public function getBodyType(){
    return $this->bodyType;
  }
  
  public function getCarName(){
    return $this->carName;
  }
  
  public function getMaxSpeed(){
    return $this->maxSpeed;
  }
  
  public function getSpeed(){
    if ($this->speed !== NULL){
      return $this->speed;
    }
    if ($this->distance !== '' && !empty($this->time)){
      $this->speed = $this->distance / $this->time;
    } else {
      return false;
    }
    if ($this->speedUnits == 'ms'){
      $this->speed /= 3.6;
    }
    return $this->speed;
  } 
  
  public function getWheelsCount(){
    return $this->wheelsCount;
  }
  
  public function printSpeed(){
    if ($this->getSpeed() === false){
      return false;
    }
    echo "Средняя скорость автомобиля в пути " . round($this->speed, 2)
        . " {$this->rusUnits[$this->speedUnits]}";
    return true;
  }  

  public function setBodyType($val){
    $this->bodyType = $val;
  }
  
  public function setCarName($val){
    $this->carName = $val;
  }
  
  public function setMaxSpeed($val){
    $this->maxSpeed = $val;
  }
  
  public function setWheelsCount($val){
    $this->wheelsCount = $val;
  }
}
