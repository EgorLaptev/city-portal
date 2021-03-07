<?php require 'core/session_start.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Улучши свой город</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require 'header.php' ?>
<div class="jumbotron">
    <div class="container">
        <h1>Привет, дорогой друг!</h1>
        <p>
            Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому мы
            предлагаем тебе помочь своему городу!
        </p>
        <p>
            Увидел проблему? Дай нам знать о ней и мы ее решим!
        </p>
        <p>
            <a class="btn btn-success btn-lg" href="#" role="button">Сообщить о проблеме</a>
            <a class="btn btn-primary btn-lg" href="#" role="button">Присоедениться к проекту</a>
        </p>
    </div>
</div>

<div class="container last">
    <h2>Последние решенные проблемы</h2>
    <br>
    <div class="wrap">
        <div class="problem-decision">
            <img src="img/problem1.jpeg">
            <img src="img/decision1.jpeg">
        </div>
<!--         <div class="problem-decision">
            <img src="img/problem2.jpeg">
            <img src="img/problem2.jpeg">
        </div> -->
        <div class="problem-decision">
            <img src="img/problem3.jpeg">
            <img src="img/decision3.jpeg">
        </div>
        <div class="problem-decision">
            <img src="img/problem4.jpeg">
            <img src="img/decision4.jpeg">
        </div>
        <div class="problem-decision">
            <img src="img/problem5.jpeg">
            <img src="img/decision5.jpeg">
        </div>
        <div class="problem-decision">
            <img src="img/problem6.jpeg">
            <img src="img/decision6.jpeg">
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>