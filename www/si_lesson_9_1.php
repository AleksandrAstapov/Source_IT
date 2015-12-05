<?php
error_reporting(4);

$host = 'localhost';
$user = 'root';
$password = 'root';

$link = new mysqli($host, $user, $password);
$link->select_db("test");

if (isset($_REQUEST['register'])){
	$arErrors = array();
	if (!preg_match("/[A-Za-zА-Яа-яЁё]{1,30}/", $_REQUEST['name'])) {
		$arErrors[] = 'Имя должен содержать только латинские и кироллические буквы';
	}
	if (!preg_match("/[A-Za-z0-9_]{1,30}/", $_REQUEST['login'])) {
		$arErrors[] = 'Логин должен содержать только латинские буквы, цифры и подчеркивание';
	}
	if ($_REQUEST['pass'] !== $_REQUEST['pass_confirm'] || empty($_REQUEST['pass'])) {
		$arErrors[] = 'Пароли не совпадают';
	}
	$query = "SELECT count(`id`) FROM `users` WHERE `login`='{$_REQUEST['login']}';";
	$result = $link->query("SQL");
	if ($result){
		$arErrors[] = 'Пользователь с таким именем уже существует';
	}
	if (count($arErrors) > 0){
		foreach ($arErrors as $value) {
			echo $value,'<br>';
		}
	} else {
		echo 'OK','<br>';
	}
}

$link->close(); 

?>

<HTML>
	<HEAD>
		<META charset="utf-8">
		<TITLE>Урок №9</TITLE>
	</HEAD>
	<BODY>
		<form method="POST">
			<p><input type="text" name="name" placeholder="Name"></p>
			<p><input type="text" name="login" placeholder="Login"></p>
			<p><input type="password" name="pass" placeholder="Password"></p>
			<p><input type="password" name="pass_confirm" placeholder="Password confirm"></p>
			<p>
			<label>
				<input type="checkbox" name="ip">
			</label>
			</p>
			<p>
			<button type="submit" name="register">
				Auth
			</button>
			</p>
		</form>
	</BODY>
</HTML>