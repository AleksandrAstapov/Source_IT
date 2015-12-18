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
    'Turkey' => array('Турция', 1),
    'Egypt' => array('Египет', 1.1),
    'Italy' => array('Италия', 1.12)
    );

// Рассчет стоимости
if (isset($_REQUEST['country'])){
$country = $_REQUEST['country'];
$duration = (int) $_REQUEST['duration'];
$discount = isset($_REQUEST['discount']) ? 'checked' : '';
$fullPrice = $duration*$rate*$countries[$country][1];
$price = $discount ? $fullPrice*0.95 : $fullPrice;
} else {
  $country = $duration = $discount = $price = '';
}
?>

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
        <?php foreach ($countries as $key => $val): ?>
        <option value="<?=$key;?>" <?=($key == $country) ? 'selected' : '';?>>
          <?=$val[0];?>
        </option>
        <?php endforeach;?>
      </select>
      <p>
        Длительность поездки, дни:
      </p>
      <input type="text" name="duration" value="<?=$duration;?>">
      <p>
        <label>
          <input type="checkbox" name="discount" <?=$discount;?>> У меня есть скидка!
        </label>
      </p>
      <button type="submit"> Вычислить </button>
    </form>
    <?php if ($price): ?>
    <p>Стоимость поездки составит <b><?=$price;?></b> грн.</p>
    <?php endif;?>
  </BODY>
</HTML>