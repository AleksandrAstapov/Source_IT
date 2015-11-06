<?php
/*
 * Filename:    si_homework_1_2.php
 * Type:        PHP Document
 * Created:     06.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #1bonus - Creating a simple form
 */


$cook = filter_input_array(INPUT_COOKIE);
$gets = filter_input_array(INPUT_GET);
$SELF = filter_input(INPUT_SERVER,'PHP_SELF');

if (empty($gets['name'])){
  $name = '';
  $nameCookie = (isset($cook['name']))? $cook['name']:'';
} else {
  $name = $nameCookie = $gets['name'];
  setcookie("name", $name);
}
if (empty($gets['age'])){
  $age = '';
  $ageCookie = (isset($cook['age']))? $cook['age']:'';
} else {
  $age = $ageCookie = $gets['age'];
  setcookie("age", $age);
}

html_header("HomeWork #1bonus");
?>
<form method="get" action="<?=$SELF;?>">
  <p>
    <label>
      <input type="text" name ="name" placeholder="<?=$nameCookie;?>"> Укажите ваше имя
    </label>
  <p>
    <label>
      <input type="text" name ="age" placeholder="<?=$ageCookie;?>"> Укажите ваш возраст
    </label>
  </p>
  <button type="submit">Отправить</button>
</form>
<?php
if (!empty($name)){
  echo "<p>Mеня зовут $name";
  if (!empty($age)){
    echo ", мне $age лет</p>";
  } else {
    echo "</p>";
  }
}
html_footer();

function html_header($title='No title', $css_file='', $js_file='', $prepend=''){  
  header('Content-Type: text/html;charset=utf-8');
  header('Pragma: no-cache');
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

/*
 * Useful links:
 * http://htmlbook.ru/samhtml/struktura-html-koda
 * http://htmlbook.ru/html/head
 * http://htmlbook.ru/html/form
 * http://htmlbook.ru/html/input
 * http://php.net/manual/ru/function.header.php
 * http://php.net/manual/ru/function.setcookie.php
 * https://ru.wikipedia.org/wiki/Список_заголовков_HTTP
 */