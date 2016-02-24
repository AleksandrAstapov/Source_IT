<?php
//echo 'Ура';
//var_dump($_REQUEST);


$text = "Привет ".$_REQUEST['name']."<br>".$_REQUEST['text'];

mail($_REQUEST['email'],"gggg", $text);
echo true;

