<?php

$requestVar = array('inputPath', 'outputPath', 'action');
foreach ($requestVar as $val){
  $$val = isset($_REQUEST[$val]) ? $_REQUEST[$val] : '';
}

if ($inputPath) {
  $inputVal = get_input_values($inputPath);
}
if (!$action || !$inputPath || !$inputVal) {
  goto html;
}

switch ($action){
  case "sum":
    $outputVal = sum_array($inputVal);
    break;
  case "product":
    $outputVal = product_array($inputVal);
    break;
  case "miscellany":
    $outputVal = miscellany_array($inputVal);
    break;
  default:
    break;
}

if ($outputVal) {
  $dir = $outputPath ? $outputPath : ".";
  save_output($outputVal, "$dir/output_$action.txt");
}

// FUNCTIONS

function get_input_values($inputPath){
  $inputArray = file($inputPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  if (empty($inputArray)) {
    notice_message("Не удалось прочитать файл $inputPath или он пуст");
    return false;
  }
  foreach ($inputArray as $key => $val){
    $inputVal[$key] = explode(' ', $val);
  }
  return $inputVal;
}

function sum_array($inputVal){
  if (!is_array($inputVal)) {
    notice_message("$inputVal не является массивом");
    return false;
  }
  foreach ($inputVal as $key1 => $val1) {
    if (!is_array($val1)) {
      notice_message("ячейки inputVal не являются массивами");
      return false;
    }
    if ($key1 === 0){
       $outputVal[0] = $val1;
    } else {
      foreach ($val1 as $key2 => $val2){
        $outputVal[0][$key2] += $val2;
      }
    }
  }
  return $outputVal;
}

function product_array($inputVal){
  if (!is_array($inputVal)) {
    notice_message("inputVal не является массивом");
    return false;
  }
  foreach ($inputVal as $key1 => $val1) {
    if (!is_array($val1)) {
      notice_message("ячейки inputVal не являются массивами");
      return false;
    }
    if ($key1 === 0){
       $outputVal[0] = $val1;
    } else {
      foreach ($val1 as $key2 => $val2){
        $outputVal[0][$key2] *= $val2;
      }
    }
  }
  return $outputVal;
}

function miscellany_array($inputVal){
  if (!is_array($inputVal)) {
    notice_message("inputVal не является массивом");
    return false;
  }
  $outputVal = array();
  if (!is_array($inputVal[0]) || !is_array($inputVal[1])) {
    notice_message("ячейки $inputVal не являются массивами");
    return false;
  } else {
    $outputVal[0] = $inputVal[0];
    rsort($outputVal[0], SORT_NUMERIC);
    foreach ($inputVal[1] as $key => $val) {
      if (!is_numeric($val)) {
        notice_message("ячейки inputVal содержат не числа");
        return false;
      }
      $outputVal[1][$key] = pow($val,2);
    }
  }
  return $outputVal;
}

function save_output($outputVal, $outputPath = 'tmp_output.txt'){
  if (!is_array($outputVal)) {
    notice_message("outputVal не является массивом");
    return false;
  }
  $outputPathW = iconv('UTF-8', 'CP1251', $outputPath);
  if (!$fp = fopen($outputPathW, 'wb')){
    notice_message("Невозможно сохранить файл $outputPath");
    return false;
  }
  foreach ($outputVal as $key => $val){
    if (is_array($val)){
      $val = implode(' ', $val);
    }
    fwrite($fp, $val."\n");
  }
  fclose($fp);
  return $outputVal;
}

function notice_message($msg){
  ?>
  <SCRIPT>
    alert('<?=$msg?>');
  </SCRIPT>
  <?php
}

html:
?>

<HTML>
  <HEAD>
    <META charset="utf-8">
    <TITLE>Операции с массивами</TITLE>
  </HEAD>
  <BODY>
    <form method="POST">
      <div>
        <p>
          <label>Путь к исходному файлу
            <input type="text" name="inputPath" value="<?=$inputPath?>" placeholder="input.txt">
          </label>
        </p>
        <p>
          <label>Каталог для сохранения результата
            <input type="text" name="outputPath" value="<?=$outputPath?>" placeholder="output_dir">
          </label>
        </p>
        <p>
          <button type="submit" name="action" value="sum">
            Сумма массивов
          </button>
          <button type="submit" name="action" value="product">
            Произведение массивов
          </button>
          <button type="submit" name="action" value="miscellany">
            Сортировка и квадраты
          </button>
        </p>
      </div>
      <output>
        <?php if (!empty($inputVal)): ?>
          <p>
            Входные данные:<br>
            <?php foreach ($inputVal as $val): ?>
              <?= implode(' ', $val); ?><br>
            <?php endforeach; ?>
          </p>
        <?php endif; ?>
        <?php if (!empty($outputVal)): ?>
          <p>
            Выходные данные:<br>
            <?php foreach ($outputVal as $val): ?>
              <?= implode(' ', $val); ?><br>
            <?php endforeach; ?>
          </p>
        <?php endif; ?>
      </output>
    </form>
  </BODY>
</HTML>