<?php

if (isset($_REQUEST['action'])){
  $action = $_REQUEST['action'];
  $dirRel = trim($_REQUEST['dir'], './ ');
} else {
  $action = '';
  $dirRel = '';
}
$dir = "./$dirRel";

switch ($action){
  case "save_file":
    $textarea = isset($_REQUEST['textarea']) ? $_REQUEST['textarea'] : '';
    $newName = isset($_REQUEST['newName']) ? $_REQUEST['newName'] : '';
    $current = isset($_REQUEST['current']) ? $_REQUEST['current'] : '';
    $fileName = save_file($dir, $newName, $textarea) ? $newName : $current;
    $target = "_blank";
    $title = "Редактирование файла $fileName";
    break;
  case "open_file":
    $fileName = isset($_REQUEST['file']) ? $_REQUEST['file'] : '';
    $newName = $fileName;
    $textarea = open_file($dir, $fileName);
    $target = "_blank";
    $title = "Редактирование файла $fileName";
    break;
  default:
    $fileName = $newName = $textarea = '';
    $target = "_self";
    $title = "Вы можете создать новый файл или редактировать существующий";
    break;
}


function save_file($dir, $newName, $textarea){
  if (!$newName){
    notice_message("Не указано имя файла");
    return false;
  }
  $dirW = iconv('UTF-8', 'CP1251', $dir);
  $fileNameW = iconv('UTF-8', 'CP1251', $newName);
  if ((bool) $fp = fopen("$dirW/$fileNameW", "wb")){
    $filecontent = htmlspecialchars_decode($textarea); 
    fwrite($fp, $filecontent);
    fclose($fp);
  } else {
    notice_message("Невозможно сохранить файл $newName");
    return false;
  }
  return $newName;
}

function open_file($dir, $fileName){
  if (!$fileName){
    error_message("Файл не выбран");
  }
  if ($fileName == $_REQUEST['current']){
    error_message("Файл $fileName уже открыт");
  }  
  $dirW = iconv('UTF-8', 'CP1251', $dir);
  $fileW = iconv('UTF-8', 'CP1251', $fileName);
  if (!is_file("$dirW/$fileW")){
    error_message("Невозможно открыть файл $fileName");
  }
  return htmlspecialchars(file_get_contents("$dirW/$fileW")); 
}

function notice_message($msg){
  ?>
  <SCRIPT>
    alert('<?=$msg?>');
  </SCRIPT>
  <?php
}

function error_message($msg){
  ?>
  <SCRIPT>
    alert('Error! <?=$msg?>');
    if (!window.history.back()) {
      window.close();
    }
  </SCRIPT>
  <?php
  exit;
}

?>

<HTML>
  <HEAD>
    <META charset="utf-8">
    <TITLE>Редактор</TITLE>
  </HEAD>
  <BODY>
    <form method="POST">
      <input type="hidden" name="dir" value="<?=$dirRel?>">
      <input type="hidden" name="current" value="<?=$fileName?>">
      <div>
        <h4><?=$title?></h4>
        <p>
          <button type="submit" name="action" value="save_file">
            Сохранить как
          </button>
          <input type="text" name="newName" value="<?=$newName?>" placeholder="выберите имя и тип">
        </p>
        <p>
          <button type="submit" name="action" value="open_file" formtarget="<?=$target?>">
            Редактировать файл
          </button>
          <input type="text" name="file" value="<?=$fileName?>" placeholder="выберите файл">
        </p>
      </div>
      <div>
        <textarea name="textarea" style="width: 500px; height: 500px"><?=$textarea?>
        </textarea>
      </div>
    </form>
  </BODY>
</HTML>