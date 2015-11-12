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