<?php
  if(session_status() != 2) session_start();
  require_once 'core/connect.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Улучши свой город</title>
  <link rel="stylesheet" href="./media/css/bootstrap.min.css">
  <link rel="stylesheet" href="./media/css/header.css">
  <link rel="stylesheet" href="./media/css/index.css">
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://city-portal/"><img src="./media/img/logo.jpg" alt="logo"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="http://city-portal/">Главная</a></li>
          <?php if(isset($_SESSION['login']) && !empty(trim($_SESSION['login']))) : ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php

                  $login = $_SESSION['login'];
                  $resp = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1");
                  $user = $resp->fetch(PDO::FETCH_ASSOC);

                  echo preg_replace("#(\S++)\s(\S)\S++\s(\S)\S++#u", "$1 $2.$3.", $user['fullname']);

                ?>
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php if($_SESSION['login'] == 'admin') : ?>
                  <li><a href="panel.php">Панель управления</a></li>
                <?php endif ?>
                <li><a href="list.php">Мои заявки</a></li>
                <li><a href="new.php">Новая заявка</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="core/log_out.php">Выход</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class=""><a href="sign_up.php">Зарегистрироваться</a></li>
            <li><a href="sign_in.php">Войти</a></li>
          <?php endif; ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="jumbotron">
    <div class="container">
      <h1>Привет, дорогой друг!</h1>
      <p>
        Вместе мы сможем улучшить наш любимый город. Нам очень сложно узнать обо всех проблемах города, поэтому мы
        предлагаем тебе помочь своему городу!
      </p>
      <p>
        С нами уже целых <?=($pdo->query("SELECT * FROM `users`")->rowCount());?> пользователей!<br>
        Всего мы решили <?=($pdo->query("SELECT * FROM `applications` WHERE `status` = 'solved'")->rowCount());?> проблем!
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

  <div class="container">
    <h2>Последние решенные проблемы</h2>
    <br>
    <div class="wrap">
      <?php

        $resp = $pdo->query("SELECT * FROM `applications` WHERE `status` = '1' LIMIT 8");
        $apps = $resp->fetchAll(PDO::FETCH_ASSOC);

        foreach ($apps as $app) :

      ?>

      <div class="couple">
        <img class="photo" src="data:image/png;base64,<?=base64_encode($app['photo'])?>">
        <div class="wrap">
          <span class="date"><?=$app['date']?></span><br>
          <h3 class="title"><?=$app['title']?></h3><br>
          <p class="description"><?=$app['description']?></p><br>
          <span class="category">Категория: <?=$app['category']?></span><br>
        </div>
      </div>

      <?php endforeach; ?>
    </div>
  </div>

  <script src="./media/js/jquery-3.3.1.min.js"></script>
  <script src="./media/js/bootstrap.js"></script>
</body>

</html>
