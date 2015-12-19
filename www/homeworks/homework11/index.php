<?php

/*
 * ДЗ: Реализовать систему вывода курса валют через наследование. 
 * Есть класс общий для всех валют. Его наследуют классы конкретной валют. 
 * Чтобы вы немного подумали, то какие мктоды будет в базовом классе и какие в наследниках - 
 * предоставляю придумать вам. это касается и полей. 
 * Если кто захочет, то может сделать конвертацию из одной валюты в другую)))) 
 * изначально необходимо просто вывести текущий курс валют в удобном виде)
 */

class CMoney {
  public $currency;
  public $currencyList = array();
  public $name;
  public $purchase;
  public $sale;
  public function __construct($file) {
    $fp = fopen($file, 'rb');
    while (!feof($fp)) {
      $moneyArray = fgetcsv($fp);
      $this->currencyList[] = $moneyArray[0];
      if ($moneyArray[0] === $this->currency){
        $this->purchase = $moneyArray[1];
        $this->sale = $moneyArray[2];
      }
    }
    fclose($fp);
  }
  public function display(){
    ?>
    <HTML>
      <HEAD>
        <META charset="utf-8">
        <TITLE><?= $this->name; ?></TITLE>
      </HEAD>
      <BODY>
        <h4><?= $this->name; ?></h4>
        <p>Покупка: <?= $this->purchase; ?> грн.</p>
        <p>Продажа: <?= $this->sale; ?> грн.</p>
        <form method="POST">
          Другие валюты &nbsp;
          <select name="currency">
            <?php foreach($this->currencyList as $val): ?>
            <option <?= ($val === $this->currency) ? 'selected' : '' ?>><?= $val; ?></option>
            <?php endforeach; ?>
          </select>
        </form>
      </BODY>
      <SCRIPT>
        document.forms[0].elements["currency"].onchange = function(){
          document.forms[0].submit();
        };
      </SCRIPT>
    </HTML>
    <?php
  }
}
class CMoneyUSD extends CMoney {
  public $currency = "USD";
  public $name = "Доллар США";
}
class CMoneyEUR extends CMoney {
  public $currency = "EUR";
  public $name = "Евро";
}
class CMoneyRUB extends CMoney {
  public $currency = "RUB";
  public $name = "Российский рубль";
}

$class = filter_input(0, 'currency') ? 'CMoney'.filter_input(0, 'currency') : 'CMoneyUSD';
$objMoney = new $class('./money2.csv');
$objMoney->display();