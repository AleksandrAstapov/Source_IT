<?php

function my_print(){
	echo "Привет, я функция без параметров";
}

function print_array($array = "Параметр по умолчанию"){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function sum($array){
	$sum = 0;
	foreach($array as $val){
		if($val%2 != 0) {
			$sum += $val;
		}
	}
	return $sum;
}

function sum_ab($a,$b=8){
	return $a+$b;
}

function mul($a,$b,&$res){
	$res="Передаюсь по ссылке";
	return $a*$b;
}

function my_pow($array){
	foreach($array as &$val){
		$val = pow($val, 2);
	}
	return $array;
}

function sum_array($ar1,$ar2){
	for($i=0;$i<count($ar1);$i++){
		$arResult[]=$ar1[$i]+$ar2[$i];
	}
	return $arResult;
}


//2015-11-18
function read_str_file($path){
	if (file_exists($path)){
		$fp = fopen($path, 'rb');
		$text = fgets($fp);
		fclose($fp);
		return $text;
	} else {
		return "Файл с именем <b>$path</b> не существует";
	}
}

function read_all_file($path){
	if (file_exists($path)){
		$fp = fopen($path, 'rb');
		$chars = '';
		while (!feof($fp)){
			$char = fgetc($fp);
			$char .= fgetc($fp);
			if ($char != 'а'){
				$chars .= $char;
			}
		}
		fclose($fp);
		return $chars;
	} else {
		return "Файл с именем <b>$path</b> не существует";
	}
}