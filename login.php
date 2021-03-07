<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Login</title>
</head>
<body>

	<?php require 'header.php'; ?>

	<form method="POST" action="core/login.php">
		<input type="text" name="login" placeholder="Логин">
		<input type="password" name="password" placeholder="Пароль">
		<input type="submit" name="sign_in" value="Войти">
	</form>

</body>
</html>