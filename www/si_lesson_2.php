<?php
$age = 20;

echo $age == 20? $age:"Error";

echo "<br>";

switch ($age) {
	case 20:
		echo "case 20";
		break;
	case 30:
		echo "case 30";
		break;
	default:
		echo "default";
		break;
}