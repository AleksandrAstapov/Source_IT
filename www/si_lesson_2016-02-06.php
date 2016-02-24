<!DOCTYPE html>
<html lang="ru">
  <head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery.arcticmodal-0.3.css" rel="stylesheet">
    <link href="css/simple.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>si_lesson_2016-02-06</title>

  </head>
  <body>
    
    <button class="push" id="auth">Авторизация</button>
    <button class="push" id="reg">Регистрация</button>
    
    <div style="display: none;">
      <div class="box-modal" id="modalauth">
          <div class="box-modal_close arcticmodal-close">x</div>
          <!--Пример модального окна 1-->
          <form action="">
            <input type="text" placeholder="Login"><br>
            <input id="password" type="password" placeholder="Password"><br>
            <input type="checkbox" class="showPass" id="showPass">
            <label for="showPass">Показать пароль</label>
          </form>
      </div>
    </div>
    
    <div style="display: none;">
      <div class="box-modal" id="modalreg">
          <div class="box-modal_close arcticmodal-close">x</div>
          <!--Пример модального окна 2-->
          <p class="text"></p>
      </div>
    </div>

  
    <script src="js/jquery-1.11.2.js"></script>
    <script src="js/jquery.arcticmodal-0.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

