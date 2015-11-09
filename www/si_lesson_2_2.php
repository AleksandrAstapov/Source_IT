<?php

$arPeople = array(
	'PEOPLE' => array(
		array(
			'NAME' => 'Вася',
			'AGE' => 45,
			'FAMILY' => array(
				array('NAME' => 'Евгений','AGE' => 15),
				array('NAME' => 'Оля','AGE' => 17)
				)
			),
		array(
			'NAME' => 'Петя',
			'AGE' => 16
			),
		array(
			'NAME' => 'Иван',
			'AGE' => 17
			)
	)
);

$count = count($arPeople['PEOPLE']);
$index = 0;
do {
	echo $arPeople['PEOPLE'][$index]['NAME'],"<br>";
	$index++;
} while($index < $count);
