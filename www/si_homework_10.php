<?php

/*
 * Рассчитать скорость движения машины и вывести её в удобочитаемом виде. 
 * Осуществить возможность вывода в км/ч, м/c.
 * Исходные данные: Пройденный путь - S; Время движения - t.
 * 
 * С применением ООП. В классе обязательно должен быть конструктор.
 * Должны быть поля:
 * Название автомобиля,
 * Максимальная скорость,
 * Тип кузова,
 * Количество колес.
 * 
 * Методы которые изменяют или получают значения этих полей.
 * Метод который проводит расчет.
 * метод который выводит результат на экран.
 */

include_once 'CCar.class.php';

$objCar = new CCar;

?>

<HTML>
  <HEAD>
    <META charset="utf-8">
    <TITLE>Расчет скорости</TITLE>
  </HEAD>
  <BODY>
    <h4>Расчет скорости автомобиля</h4>
    <form method="POST">
      <div>
        <p>
          <input type="text" name="distance" 
                 value="<?= $objCar->distance; ?>" placeholder="Пройденный путь"> км
        </p>
        <p>
          <input type="text" name="time" 
                 value="<?= $objCar->time; ?>" placeholder="Время движения"> час
        </p>
        <p>
          Ответ вывести в: 
          <label>
            <input type="radio" name="speedUnits" value="kmh"
                   <?= ($objCar->speedUnits !== 'ms') ? 'checked' : '' ?>>км/час
          </label>
          <label>
            <input type="radio" name="speedUnits" value="ms"
                   <?= ($objCar->speedUnits === 'ms') ? 'checked' : '' ?>>м/c
          </label>
        </p>
        <p>
          <button type="submit" name="action" value="speed">
            Вычислить
          </button>
        </p>
      </div>
      <div>
        <p>
          <strong><?php $objCar->printSpeed(); ?></strong>
        </p>
      </div>
    </form>
  </BODY>
</HTML>

