<?php

interface IQuestion {
public function showQuestion();
}

abstract class CQuestion {
  public $questions;
  public $answer;
  
  public function __construct($questions) {
    $this->questions = $questions;
  }
  abstract public function showQuestion();
  abstract public function checkAnswer($question,$answer);
  
}

class CAnyAnswer extends CQuestion {
  public function showQuestion(){
    $size = count($this->questions)-1;
    $index = rand(0, $size);
    $this->currentQuestion = $index;
    return $index;
  }
  public function checkAnswer($idQuestion,$idAnswer){
    if ($this->questions[$idQuestion]['CHECK'] == $idAnswer){
      return true;
    } else {
      return false;
    }
  }
}

$arQuestion = array(
    array(
        'QUESTION'=>'Сколько типов данных в PHP?',
        'ANSWERS'=>array(2,4,5,6,7,8),
        'CHECK'=>5
    ),
    array(
        'QUESTION'=>'Как объявляется переменная в PHP?',
        'ANSWERS'=>array('$var = 10;','int var = 10;','var v = 10:'),
        'CHECK'=>0
    ),
    array(
        'QUESTION'=>'Как объявляется массив в PHP?',
        'ANSWERS'=>array('$var = array();','define("PI",3.14)','var v = 10;'),
        'CHECK'=>0
    )
);

$anyAnswer = new CAnyAnswer($arQuestion);

if (filter_input(0,'send')){
  $index = $_REQUEST['question'];
  if(!$anyAnswer->checkAnswer($_REQUEST['question'],$_REQUEST['answer'])){
    echo "Ответ неверный";
  }
} else {
  $index = $anyAnswer->showQuestion();
}

?>

<!--
<link rel="stylesheet" href="./css/bootstrap.min.css">
<form action="" method="post">
  <input type="hidden" name="question" value="<?= $index; ?>">
    <p><?= $arQuestion[$index]['QUESTION'] ?></p>
    <?php foreach($arQuestion[$index]['ANSWERS'] as $key => $question):?>
    <p>
      <input type="radio" name="answer" id="send<?= $key; ?>">
      <label for="answer"><?= $question ?></label>
    </p>
    <?php endforeach?>
    <button class="btn btn-primary" type="submit" name="send">
      Проверить
    </button>
    <a class="btn btn-default" href="">Обновить</a>
</form>
-->