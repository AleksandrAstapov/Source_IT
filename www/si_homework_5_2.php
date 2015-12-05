<?php

if (isset($_REQUEST['action'])){
  $action = $_REQUEST['action'];
  $dirRel = trim($_REQUEST['dir'], './ ');
  if ($action == "change_dir"){
    change_dir($dirRel, $_REQUEST['newDir']);
  }
} else {
  $action = '';
  $dirRel = '';
}
$dir = trim($_SERVER['DOCUMENT_ROOT'].$dirRel, './ ');
$dirW = iconv('UTF-8', 'CP1251', $dir);

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
    $fileName = $newName = isset($_REQUEST['file']) ? $_REQUEST['file'] : '';
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

function change_dir(&$dirRel, $newDir){
  global $dir;
  if ($newDir == '..' && $dir.'/' == $_SERVER['DOCUMENT_ROOT']){
    return;
  } elseif ($newDir == '..'){
    $dirRel = trim(dirname($dirRel), './ ');
  } else {
    $dirRel = trim("$dirRel/$newDir", './ ');
  }
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
  <BODY style="background-color: azure">
    <h4><?=$title?></h4>
    <form method="POST" style="width: 100%">
      <input type="hidden" name="dir" value="<?=$dirRel?>">
      <input type="hidden" name="current" value="<?=$fileName?>">
      <div>
        <p>
          <button type="submit" name="action" value="" formtarget="<?=$target?>">
            Новый
          </button>
          <button type="submit" name="action" value="save_file">
            Сохранить как
          </button>
          <input type="text" name="newName" value="<?=$newName?>" placeholder="выберите имя и тип">
        </p>
        <p>
          <button type="submit" name="action" value="open_file" formtarget="<?=$target?>">
            Редактировать файл
          </button>
          <select name="file" style="min-width: 100px">
            <?php
            foreach (scandir($dirW) as $fileW):
              if (is_file("$dirW/$fileW")):
              ?>
              <option><?= iconv('CP1251', 'UTF-8', $fileW); ?></option>
              <?php
              endif;
            endforeach;
            ?>
          </select>
        </p>
        <p>
          <button type="submit" name="action" value="change_dir" formtarget="<?=$target?>">
            Сменить каталог
          </button>
          <select name="newDir" style="min-width: 100px">
            <?php
            foreach (scandir($dirW) as $fileW):
              if (is_dir("$dirW/$fileW") && $fileW != '.'):
              ?>
              <option><?= iconv('CP1251', 'UTF-8', $fileW); ?></option>
              <?php
              endif;
            endforeach;
            ?>
          </select>
        </p>
        <p>
          Текущий каталог <em><?= $_SERVER['SERVER_NAME'].'/'.$dirRel.'/'; ?></em>
        </p>  
      </div>
      <div>
        <textarea name="textarea" style="width: 100%; min-height: 700px"><?=$textarea;?>
        </textarea>
      </div>
    </form>
  </BODY>
</HTML>