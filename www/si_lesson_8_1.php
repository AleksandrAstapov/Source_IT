<?php

$host = 'localhost';
$user = 'root';
$password = 'root';

$link = new mysqli($host, $user, $password);
if ($link) {
	echo "ОК","<br>";
} else {
	echo $link->connect_error,"<br>";
}

if ($link->select_db("taxi")) {
	$query = "SHOW TABLES;";
	$result = $link->query($query);
	for ($i=0; $i < $result->num_rows; $i++){
		$arResult = $result->fetch_row();
		echo $arResult[0],"<br>";
	}
}

$query = "INSERT INTO `access` (`name`, `permission`) VALUES ('user', 3);";
$result = $link->query($query);
if ($result) echo "OK";