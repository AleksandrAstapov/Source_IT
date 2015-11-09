<?php
/*
 * Filename:    si_homework_2_2.php
 * Type:        PHP Document
 * Created:     09.11.2015
 * Author:      Aleksandr Astapov
 * Source:      Source IT, PHP Web-development courses, teacher - Evgeniy Nakoneschniy
 * Description: HomeWork #2_2 - Tourist trip cost calculator 
 */

$rate = 400;
$countries = array(
    'Turkey' => ['Турция', 1],
    'Egypt' => ['Египет', 1.1],
    'Italy' => ['Италия', 1.12]
    );

// Рассчет стоимости
if (isset($_REQUEST['country'])){
$country = $_REQUEST['country'];
$duration = (int) $_REQUEST['duration'];
$discount = empty($_REQUEST['discount'])? '':'checked';
$fullPrice = $duration*$rate*$countries[$country][1];
$price = (empty($discount))? $fullPrice : $fullPrice*0.95;
} else {
  $country = $duration = $discount = '';
};?>

 <!--Заполненная форма и результат расчета--> 
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
            echo "<option value=\"$key\" selected>$val[0]</option>";
          } else {
            echo "<option value=\"$key\">$val[0]</option>";
          }
        };?>
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
    <?=(isset($price)) ? "<p>Стоимость поездки составит <b>$price</b> грн.</p>" : '';?>
  </BODY>
</HTML>