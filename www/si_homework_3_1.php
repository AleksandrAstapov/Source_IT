<?php
/*
 * Filename:    si_homework_3_1.php
 * Type:        PHP Document
 * Created:     13.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #3 - Array and function
 */


// Инициализация переменных
$paramsList = isset($_REQUEST['params']) ? $_REQUEST['params'] : '';
$multiplierPercent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : '';
$errorString = '';

// Расчет
if ($paramsList && $multiplierPercent){
  $paramsArray = explode(',', $paramsList);
  $resultArray = array_each_multiplier($paramsArray, $multiplierPercent, $errorString);
  if ($resultArray){
    $resultList = implode(', ', $resultArray);
  }
}

// Функции
function array_each_multiplier($inputArray, $multiplier=50, &$errorString=''){
  if ($multiplier > 0){
    $multiplier /= 100;
  } else {
    $errorString .= "Ошибка! Передано отрицательное значение множителя ";
    return false;
  }
  foreach ($inputArray as $value) {
    if (filter_var($value, FILTER_VALIDATE_FLOAT)){
      $outputArray[] = $value*$multiplier;
    } else {
      $errorString .= "Ошибка! Среди параметров присутствует нечисловое значение $value ";
      return false;
    }
  }
  return $outputArray;
}
?>

<!--Форма и результат расчета--> 
<!DOCTYPE html>
<HTML>
  <HEAD> 
    <META charset="utf-8">
    <TITLE>Процентный множитель</TITLE>
  </HEAD>
  <BODY>
    <form method="post">
      <p>Введите числовые параметры, через запятую:</p>
      <textarea name="params" cols="100"><?=$paramsList;?>
      </textarea>
      <p>Введите множитель, в процентах:</p>
      <input type="text" name="percent" value="<?=$multiplierPercent;?>">%
      <p>
        <button type="submit"> Вычислить </button>
      </p>
    </form>
    <?php if (isset($resultList)): ?>
      <p>Результат расчета:</p>
      <p><?=$resultList;?></p>
    <?php else: ?>  
      <p style="color: red;"><?=$errorString;?></p>
    <?php endif;?>
  </BODY>
</HTML>