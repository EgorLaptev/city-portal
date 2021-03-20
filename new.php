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
  <link rel="stylesheet" href="./media/css/new.css">
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

  <h1>Сообщите о проблеме</h1>

  <form enctype="multipart/form-data" class="new" action="core/new.php" method="post">
    <input type="text" name="title" placeholder="Название" required>
    <textarea  name="description" rows="8" cols="80" placeholder="Описание" required></textarea>
    <select name="category" required>
      <?php
        $cats = $pdo->query("SELECT * FROM `categories`")->fetchAll(PDO::FETCH_ASSOC);
        foreach($cats as $cat) :
      ?>
      <option value="<?= $cat['id'] ?>"><?=$cat['name']?></option>
      <?php endforeach; ?>
    </select>
    <label class="photo-label">
      Прикрепить фото
      <input type="file" name="photo" required>
    </label>
    <input type="date" name="date" required>
    <input type="submit" name="new" value="Добавить заявку">
  </form>

  <span class="error">
    <?php if(isset($_SESSION['new_error'])) echo $_SESSION['new_error']; ?>
  </span>

  <script src="./media/js/jquery-3.3.1.min.js"></script>
  <script src="./media/js/bootstrap.js"></script>
</body>

</html>
