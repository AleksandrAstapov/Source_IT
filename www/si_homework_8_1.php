<?php

/*
 * ДЗ. вывести на экран список директорий и файлов в виде ссылок. 
 * при клике на ссылку директории я могу видеть поддиректории тоже в виде ссылок. 
 * плюс добавить кнопки создать файл и создать директорию. 
 * при клике на файл выводить на отдельной странице содержимое этого файла... 
 * желательно все разбить на функции по логике действий. 
 * говорю сразу что потребуеться нексолько пхп файлов
 */

include_once 'Session.class.php';

$requestVar = array('action', 'dir', 'newdir', 'nevDirName');
foreach ($requestVar as $val){
  $$val = isset($_REQUEST[$val]) ? $_REQUEST[$val] : '';
}
$objSession = new Session($dir);

switch ($action){
  case 'deldir':
    if ($dir){
      deleteDir($dir);
      $dir = dirname($dir);
    }
    $objSession->dropdown($dir);
    break; 
  case 'newdir':
    $dir = ($dir) ? "$dir/$nevDirName" : "./$nevDirName";
    $dirW = iconv('UTF-8', 'CP1251', $dir);
    if (!is_dir($dirW)){
      mkdir($dirW, 0777);
    }
    $objSession->dropdown($dir);
    break;
  case 'dropdown':
    $objSession->dropdown($dir);
    break;
  case 'dropup':
    $objSession->dropup($dir);
    break;
  default:
    break;
}

function deleteDir($dir, $charset='UTF-8'){
  $dirW = ($charset === 'CP1251') ? $dir : iconv($charset, 'CP1251', $dir);
  if (!is_dir($dirW)){
    return;
  }
  $dirList = scandir($dirW);
  foreach ($dirList as $itemW){
    if (is_file("$dirW/$itemW")){
      unlink("$dirW/$itemW");
    } elseif ($itemW !== '.' && $itemW !== '..') {
      deleteDir("$dirW/$itemW", 'CP1251');
    }
  }
  rmdir($dirW);
}

?>

<HTML>
  <HEAD>
    <LINK rel="stylesheet" href="si_homework_8_1.css">
    <META charset="utf-8">
    <TITLE>Файловый менеджер</TITLE>
  </HEAD>
  <BODY>
    <h4>Онлайн файловый менеджер</h4>
    <form method="POST">
      <input type="hidden" name="dir" value="<?=$dir?>">
      <div>
        <p>
          <button type="submit" name="action" value="" formaction="si_homework_5_2.php" formtarget="_blank">
            Новый файл
          </button>
          <button type="submit" name="action" value="deldir">
            Удалить каталог
          </button>
          <button type="submit" name="action" value="newdir">
            Новый каталог
          </button>
          <input type="text" name="nevDirName" placeholder="Имя каталога">
        </p>
        <p>
          Текущий каталог <em><?= $_SERVER['SERVER_NAME'].'/'.trim($dir, './ ').'/' ?></em>
        </p> 
      </div>
      <div class="tree">
        <a class="<?= ($dir) ? '' : 'checked' ?>" href="<?= $_SERVER['PHP_SELF'] ?>">
          <?= $_SERVER['SERVER_NAME'] ?>
        </a>
        <br>
        <?php $objSession->dirListBuilder(); ?>
      </div>
    </form>
  </BODY>
</HTML>