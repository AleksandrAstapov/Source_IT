<?php
/*
 * Filename:    si_homework_4_1.php
 * Type:        PHP Document
 * Created:     15.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #4 - Recurtion
 */


// Инициализация переменных
//$digits = '27306';
$digits = isset($_REQUEST['digits']) ? $_REQUEST['digits'] : '';
$errorString = '';
$maxDidit = maxdig($digits,$errorString);

// Функции
function maxdig($string, &$errorString=''){
  if (!isset($string[0])){
    return false;
  }
  if ($string[0] == 9){
    return 9;
  }
  if (!is_numeric($string[0])){
    $errorString .= "Ошибка! Символ $string[0] не является числом";
    return NULL;
  }
  $maxNext = maxdig(substr($string, 1), $errorString);
  return ($maxNext === NULL) ? NULL : max($string[0], $maxNext);
}
?>

<!--Форма и результат расчета-->
<!DOCTYPE html>
<HTML>
  <HEAD>
    <META charset="utf-8">
    <TITLE>Рекурсия</TITLE>
  </HEAD>
  <BODY>
    <form method="post">
      <p>Введите запись, состоящую из десятичных цифр:</p>
      <input type="text" name="digits" value="<?=$digits;?>">
      <p>
        <button type="submit"> Найти наибольшее </button>
      </p>
    </form>
    <?php if ($maxDidit !== NULL && $maxDidit !== false): ?>
      <p>Наибольшая цифра в записи <strong><?=$digits;?></strong> это <?=$maxDidit;?></p>
    <?php elseif ($errorString): ?>
      <p style="color: red;"><?=$errorString;?></p>
    <?php endif;?>
  </BODY>
</HTML>