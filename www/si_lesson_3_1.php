<?php
include_once "functions.php";

$arNumb = range(1,10);
$arNumb1 = array_merge(array(16),range(2,10));

$sum = sum($arNumb);

// print_array();
// print_array($arNumb);
// print_array($sum);

$num1 = 2;
$num2 = 2;
$result = 0;
//echo sum_ab($num1,$num2);

/*$res = mul($num1,$num2,$result);
echo $result,"<br>";
echo $res;*/

print_array(my_pow($arNumb1));
print_array(sum_array($arNumb,$arNumb1));
print_array(sum_array(my_pow($arNumb),my_pow($arNumb1)));