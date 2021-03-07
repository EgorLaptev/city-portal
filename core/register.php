<?php 

if(isset($_POST['sign_up'])) {

	$error = '';

	if(isset($_POST['fullname']) && !empty($_POST['fullname'])) $fullname = $_POST['fullname'];
	else $error = 'Enter your fullname!';

	if(isset($_POST['login']) && !empty($_POST['login'])) $login = $_POST['login'];
	else $error = 'Enter your login!';

	if(isset($_POST['email']) && !empty($_POST['email'])) $email = $_POST['email'];
	else $error = 'Enter your email!';

	if(isset($_POST['password_2']) && !empty($_POST['password_2'])) $password_2 = $_POST['password_2'];
	else $error = 'Enter your password!';

	if(isset($_POST['password_1']) && !empty($_POST['password_1'])) $password_1 = $_POST['password_1'];
	else $error = 'Enter your password!';;

	if(empty($error)) {

		require_once 'connect.php';

		if($_POST['password_1'] = $_POST['password_2']) {

			$exist = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1")->rowCount();

			if(!$exist) {
				$pdo->query("INSERT INTO `users` (`id`, `fullname`, `login`, `email`, `password`) VALUES (NULL, '$fullname', '$login', '$email', '$password_1')");
			} else $error = 'User with such login already exists!';
					
		}

	}

}

header("Location: " . "http://wsrq/");

?>