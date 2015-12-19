<?php

interface IQuestion {
  public function showQuestion();
}

class CQuestionEN implements IQuestion {
  public function showQuestion(){
    echo "Question";
  }
}

class CQuestionRU implements IQuestion {
  public function showQuestion(){
    echo "Вопрос";
  }
}

class CMyClass {
  public $object;
  
  public function __construct($object) {
    $this->object = $object;
  }
  public function MyPrint() {
    echo $this->object->showQuestion();
  }
}

function chageLang(IQuestion $question){
  $question->showQuestion();
}

$questionEN = new CQuestionEN();
$questionRU = new CQuestionRU();
$obj = new CMyClass($questionEN);
$obj->MyPrint();

chageLang($obj);
