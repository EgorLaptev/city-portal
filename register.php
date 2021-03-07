<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<title>Register</title>
</head>
<body>

	<?php require 'header.php'; ?>

	<form method="POST" action="core/register.php">
		<input type="text" name="fullname" placeholder="ФИО" pattern="[А-Яа-яЁё]{0,}\s[А-Яа-яЁё]{0,}\s[А-Яа-яЁё]{0,}" required>
		<input type="text" name="login" placeholder="Логин" required pattern="[A-Za-z]{0,}">
		<input type="email" name="email" placeholder="Почта" required>
		<input type="password" name="password_1" placeholder="Пароль" required>
		<input type="password" name="password_2" placeholder="Подтверждение пароля" required>
		<label><input type="checkbox" name="check" required> Согласие на обработку персональных данных</label>
		<input type="submit" name="sign_up" value="Зарегистрироваться">
	</form>

</body>
</html>