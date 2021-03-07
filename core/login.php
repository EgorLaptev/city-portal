<?php 

if(isset($_POST['sign_in'])) {

	$error = '';

	if(isset($_POST['login']) && !empty($_POST['login'])) $login = $_POST['login'];
	else $error = 'Enter your login!';


	if(isset($_POST['password']) && !empty($_POST['password'])) $password = $_POST['password'];
	else $error = 'Enter your password!';

	if(empty($error)) {

		require_once 'connect.php';

		$user = $pdo->query("SELECT * FROM `users` WHERE `login` = '$login' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
			
		if($user['password'] == $password) {
			session_start();
			$_SESSION['login'] = $login;
		} else $error = 'Wrong password!';

	}

}

header("Location: " . "http://wsrq/");

?>