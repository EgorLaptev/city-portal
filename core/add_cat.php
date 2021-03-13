<?php 

if(isset($_POST['add_cat'])) {

	session_start();

	$error = '';

	if(isset($_POST['name']) && !empty(trim($_POST['name']))) $name = trim($_POST['name']);
	else $error = 'Enter category\'s name!';

	if(empty($error)) {

		require_once 'connect.php';

		$resp = $pdo->query("INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$name')");

		if(!$resp) $error = 'Something went wrong!';

	}

	$_SESSION['cat_error'] = $error;

}


header("Location: " . $_SERVER['HTTP_REFERER']);

?>