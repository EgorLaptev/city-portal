<?php if(session_status() != 2) session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Улучши свой город</title>
  <link rel="stylesheet" href="./media/css/bootstrap.min.css">
  <link rel="stylesheet" href="./media/css/header.css">
  <link rel="stylesheet" href="./media/css/sign_in.css">
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
          <li class=""><a href="http://city-portal/">Главная</a></li>
          <li><a href="sign_up.php">Зарегистрироваться</a></li>
          <li class="active"><a href="sign_in.php">Войти</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


  <form class="sign_in" action="core/sign_in.php" method="post">
    <input type="text" name="login" placeholder="Логин" pattern="[A-Za-z]{0,}" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="submit" name="sign_in" value="Зарегистрироваться" required>
  </form>

  <span class="error"><?php if(isset($_SESSION['log_error'])) echo $_SESSION['log_error'] ?></span>

  <script src="./media/js/jquery-3.3.1.min.js"></script>
  <script src="./media/js/bootstrap.js"></script>
</body>

</html>
