<?php
/*
 * Filename:    si_homework_1.php
 * Type:        PHP Document
 * Created:     06.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #1 - creating variables and use echo function
 */

$name = "Александр";
$age = 28;
html_header("HomeWork #1");
echo "<p>Меня зовут $name</p>";
printf("<p>Мне %d лет</p>", $age);
html_footer();

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