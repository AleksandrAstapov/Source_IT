<?php

/*function delItem($id){
	// return remove_db($id);
	return "ID = $id";
}

$func = 'delItem';
$id = 777;
echo $func($id);*/

/*$anonim = function($text){
	print_r($text);
}
$anonim('ggggg');*/

/*function fact($num){
	if ($num <= 1) {
		return 1;
	}
	return $num * fact($num-1);
}
echo fact(10);*/

/*function fibonachi($num){
	if ($num < 3){
		return 1;
	} else {
		return fibonachi($num-1) + fibonachi($num-2);
	}
}
for ($i=1; $i<=12; $i++){
	echo fibonachi($i),'<br>';
}*/

/*?>
<form method="post">
	<textarea name="array" cols="50"><?=$_REQUEST['array']?></textarea>
	<br>
	<button type='submit'>Send</button>
</form>
<?php
if (isset($_REQUEST['array'])){
	$arResult = explode(' ', $_REQUEST['array']);
	$str = implode(",", $arResult);
	foreach ($arResult as &$value) {
		$value += 2;
	}
	echo $str;
	echo "<pre>";
	print_r($arResult);
	echo "</pre>";
}*/

$string = "Привет, меня зовет Евгений";
$name = "меня";
$len = strlen($name);
$post = strripos($string, $name);
//echo substr($string, $post, $len);
//$res = str_replace('Евгений', $name, $string);
//echo $string,"<br>";
//echo $res,"<br>";

function get_pass($len){
	$patern = "bhgfbgfbgfbnzgf45643gfdg";
	$temp = str_shuffle($patern);
	return substr($temp, 0, $len);
}
echo get_pass(10);

