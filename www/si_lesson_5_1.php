<?php
require_once 'functions.php';
$fileName = './files/temp.txt';
$path = 'files';


function scan($path){
	if ($dp = opendir($path)){
		while ($dir = readdir($dp)){
			if ($dir == "." || $dir == "..") continue;
			if (is_dir("$path/$dir")) $arDir[$dir] = scan("$path/$dir");
			if (is_file("$path/$dir")) $arDir[$dir] = "";
		}
	closedir($dp);	
	}
	return isset($arDir) ? $arDir : '';
}

/*function scan($path, &$arDir = array()){
 if(is_dir($path)){
  $handle = opendir($path);
  if($handle){
   while ($dir = readdir($handle)) {
    $arDir[]['NAME'] = $dir;
   }
   unset($arDir[0], $arDir[1]);
   foreach ($arDir as $key => $dirName) {
    scan($path."/".$dirName['NAME'], $arDir[$key]['DIRS']);
   }
   return $arDir;
  }else{
   return;
  }
 }
}*/

$arRes = scan($path);
echo '<pre>';
print_r($arRes);
echo '</pre>';

/*echo read_str_file($fileName),"<br>";
$content = read_all_file($fileName);
echo $content;*/

/*$fp = fopen('./files/temp.txt', 'rb');
echo fread($fp, filesize('./files/temp.txt'));
fclose($fp);*/

/*$fp = fopen('./files/temp.txt', 'rb');
$text = fgets($fp);
echo $text;
fclose($fp);*/

//readfile('./files/temp.txt');

/*$fp = fopen('./files/temp.txt', 'wb');
fwrite($fp, "Привет мир!");
rewind($fp);
echo fgets($fp);
fclose($fp);*/