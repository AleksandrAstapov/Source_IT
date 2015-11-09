<?php
/*
 * Filename:    si_homework_2_2.php
 * Type:        PHP Document
 * Created:     09.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #2_2 - Tourist trip cost calculator 
 */

$countries = array(
    'Turkey' => 'Турция',
    'Egypt' => 'Египет',
    'Italy' => 'Италия'
    );

// Начальная форма, которая выводится при пустом $_REQUEST
if (!isset($_REQUEST['country'])){
  ?>
<!DOCTYPE html>
<HTML>
  <HEAD> 
    <META charset="utf-8">
    <TITLE>Туристический калькулятор</TITLE>
  </HEAD>
  <BODY>
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
      <p>
        Страна, в которую Вы хотите поехать:
      </p>
      <select name="country" size="1" style="min-width: 173px;">
        <?php
        foreach ($countries as $key => $val){
          echo "<option value=\"$key\">$val</option>";
        }
        ?>
      </select>
      <p>
        Длительность поездки, дни:
      </p>
      <input type="text" name="duration">
      <br>
      <br>
      <label>
        <input type="checkbox" name="discount"> У меня есть скидка!
      </label>
      <br>
      <br>
      <button type="submit"> Вычислить </button>
    </form>
  </BODY>
</HTML>
  <?php
  exit();
}

// Рассчет стоимости
$country = $_REQUEST['country'];
$duration = (int) $_REQUEST['duration'];
$discount = empty($_REQUEST['discount'])? '':'checked';
$rate = 400;
switch ($country){
  case 'Egypt':
    $fullPrice = $duration*$rate*1.1;
    break;
  case 'Italy':
    $fullPrice = $duration*$rate*1.12;
    break;
  case 'Turkey':
  default:
    $fullPrice = $duration*$rate;
    break;
}
$price = (empty($discount))? $fullPrice : $fullPrice*0.95;

// Заполненная форма и результат расчета
?>
<!DOCTYPE html>
<HTML>
  <HEAD> 
    <META charset="utf-8">
    <TITLE>Туристический калькулятор</TITLE>
  </HEAD>
  <BODY>
    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
      <p>
        Страна, в которую Вы хотите поехать:
      </p>
      <select name="country" size="1" style="min-width: 173px;">
        <?php
        foreach ($countries as $key => $val){
          if ($key == $country){
            echo "<option value=\"$key\" selected>$val</option>";
          } else {
            echo "<option value=\"$key\">$val</option>";
          }
        }
        ?>
      </select>
      <p>
        Длительность поездки, дни:
      </p>
      <input type="text" name="duration" value="<?=$duration;?>">
      <br>
      <br>
      <label>
        <input type="checkbox" name="discount" <?=$discount;?>> У меня есть скидка!
      </label>
      <br>
      <br>
      <button type="submit"> Вычислить </button>
    </form>
    <p>
      Стоимость поездки составит <b><?=$price;?></b> грн.
    </p>
  </BODY>
</HTML>