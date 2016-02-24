<?php

namespace main;

require_once("app1/Logger.php");
require_once("app2/Logger.php");


use app1\Logger as Log1;
use app2\Logger as Log2;


$app1 = new Log1();

$app2 = new Log2();


$app1->log("hello");

$app2->log("hello");

