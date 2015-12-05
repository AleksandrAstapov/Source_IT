<?php

/*
 * ДЗ. вывести на экран список директорий и файлов в виде ссылок. 
 * при клике на ссылку директории я могу видеть поддиректории тоже в виде ссылок. 
 * плюс добавить кнопки создать файл и создать директорию. 
 * при клике на файл выводить на отдельной странице содержимое этого файла... 
 * желательно все разбить на функции по логике действий. 
 * говорю сразу что потребуеться нексолько пхп файлов
 */

class Session {
  protected $currentDir;
  protected $openDirList;
  protected $openDirListNew = array();
  
  public function __construct($dir='') {
    session_start();
    if (empty($_SESSION['openDirList'])){
      $this->openDirList = array();
    } else {
      $this->openDirList = $_SESSION['openDirList'];
    }
    $this->currentDir = $dir;
  }
  
  public function __destruct(){
    $_SESSION['openDirList'] = $this->openDirListNew;
  }
  
  public function dropdown($dir){
    $this->currentDir = $dir;
    if (!in_array($dir, $this->openDirList)){
      $this->openDirList[] = $dir;
    }
  }
  
  public function dropup($dir){
    $this->currentDir = $dir;
    $key = array_keys($this->openDirList, $dir);
    if ($key){
      unset($this->openDirList[$key[0]]);
    }
  }
  
  public function dirListBuilder($pathname = '.', $left = 0){
    $pathnameW = iconv('UTF-8', 'CP1251', $pathname);
    $dirList = scandir($pathnameW);
    //
    foreach ($dirList as $itemW):
      if (is_dir("$pathnameW/$itemW")):
        if ($itemW === '.' || $itemW === '..'){
          continue;
        }
        $item = iconv('CP1251', 'UTF-8', $itemW);
        if (in_array("$pathname/$item", $this->openDirList)){
          $action = 'dropup';
          $mark = '-';
        } else {
          $action = 'dropdown';
          $mark = '+';
        }
        $dirU = urlencode("$pathname/$item");
        $href1 = $_SERVER['PHP_SELF']."?action=$action&dir=$dirU";
        $href2 = $_SERVER['PHP_SELF']."?action=dropdown&dir=$dirU";
        $class = ($this->currentDir === "$pathname/$item") ? 'checked' : '';
        ?>
          <a class="mark" href="<?=$href1?>" style="margin-left:<?=$left?>px">
            <?=$mark?>
          </a>
          <a class="<?=$class?>" href="<?=$href2?>">
            <?=$item?>
          </a>
          <br>
        <?php 
        if (in_array("$pathname/$item", $this->openDirList)){
          $this->openDirListNew[] = "$pathname/$item";
          $this->dirListBuilder("$pathname/$item", $left+16);
        }
      endif;
    endforeach;
    //
    foreach ($dirList as $itemW):
      if (is_file("$pathnameW/$itemW")):
        $item = iconv('CP1251', 'UTF-8', $itemW);
        $itemU = urlencode($item);
        $pathnameU = urlencode($pathname);
        $href = "si_homework_5_2.php?action=open_file&dir=$pathnameU&file=$itemU";
        ?>
          <a href="<?=$href?>" target="_blank" style="margin-left:<?=$left?>px">
            <?=$item?>
          </a>
          <br>
        <?php
      endif;
    endforeach;
  }
}
