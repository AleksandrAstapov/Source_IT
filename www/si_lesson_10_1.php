<?php

class CDatabase {
	protected $host;
	protected $user;
	protected $password;
	protected $dbname;

	public function __construct(){
		$this->host = 'localhost';
		$this->user = 'root';
		$this->password = '123';
		$this->dbname = 'test';
	}

	public function connect(){
		echo "Connect to db";
		echo "<pre>";
		print_r($this->host);
		print_r($this->user);
		print_r($this->password);
		print_r($this->dbname);
		echo "</pre>";
	}
}
$db = new CDatabase;
$db->connect();

class CHumen {

	public static $eyes = 2;
	public static $hands = 2;
	private static $religion = "xxx";
	
	private $name;
	private $age;
	private $db;

	public function __construct($name='',$age=0){
		$this->name = $name;
		$this->age = $age;
		$this->db = new CDatabase;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setAge($age){
		$this->age = $age;
	}

	public function getName($name){
		return $this->name;
	}

	public function getAge($age){
		return $this->age;
	}

	public static function getReg(){
		return self::$religion;
	}

}

//echo CHumen::$eyes,'<br>';
//echo CHumen::getReg(),'<br>';

$hum1 = new CHumen("Vasilij");
$hum2 = new CHumen("Petr");
var_dump($hum1);
var_dump($hum2);

echo "Прошло 10 лет";
$hum1->setAge(10);
$hum2->setAge(10);
var_dump($hum1);
var_dump($hum2);