<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ajax JQuery</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- main style -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form method="post" class="center-block form" id="ajax">
        <h1>JQuery Test</h1>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="age">Возраст</label>
            <input type="text" class="form-control" name="age" id="age">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <div class="center-block table-width">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Возраст</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>