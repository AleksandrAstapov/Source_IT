<?php
/*
 * Filename:    si_homework_2_1.php
 * Type:        PHP Document
 * Created:     08.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #2 - logical operators
 */

$number = 30;
$number = ($number > 10) ? $number + 100 : $number - 30;
echo $number;    
    
//html_header("HomeWork #2");
//html_footer();

function html_header($title='No title', $css_file='', $js_file='', $prepend=''){
  header('Content-Type: text/html;charset=utf-8');
  ?>
<!DOCTYPE html>
<HTML>
  <HEAD>
    <LINK rel="stylesheet" href="<?= $css_file; ?>">    
    <META charset="utf-8">
    <SCRIPT type="text/javascript" src="<?= $js_file; ?>"></SCRIPT>
    <TITLE><?= $title; ?></TITLE>
  </HEAD>
  <BODY>
  <?php
  echo $prepend;
}

function html_footer($append=''){
  echo $append;
  ?>
  </BODY>
</HTML>
<?php
}