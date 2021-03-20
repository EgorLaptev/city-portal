<?php

if(isset($_POST['sign_up'])) {

  session_start();

  $error = '';

  if(isset($_POST['fullname']) && !empty(trim($_POST['fullname']))) $fullname = trim($_POST['fullname']);
  else $error = 'Enter your fullname!';

  if(isset($_POST['login']) && !empty(trim($_POST['login']))) $login = trim($_POST['login']);
  else $error = 'Enter your login!';

  if(isset($_POST['email']) && !empty(trim($_POST['email']))) $email = trim($_POST['email']);
  else $error = 'Enter your email!';

  if(isset($_POST['password']) && !empty(trim($_POST['password']))) $password = trim($_POST['password']);
  else $error = 'Enter your password!';

  if(isset($_POST['password_ver']) && !empty(trim($_POST['password_ver']))) $password_ver = trim($_POST['password_ver']);
  else $error = 'Confirm password!';

  if($password !== $password_ver) $error = 'Confirm password!';

  if(empty($error)) {

    require_once 'connect.php';

    $exist = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1")->rowCount();

    if(!$exist) {

      $resp = $pdo->query("INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`) VALUES (NULL, '$fullname', '$login', '$email', '$password')");

      if($resp) {
        $_SESSION['login'] = $login;
        $_SESSION['reg_error'] = '';
        header('Location: ' . 'http://city-portal/');
      } else $error = 'Something went wrong!';

    } else $error = 'User with such login is already exists!';

  }

  if(!empty($error)) {
    $_SESSION['reg_error'] = $error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


}


?>
