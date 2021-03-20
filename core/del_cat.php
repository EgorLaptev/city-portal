<?php

session_start();

$error = '';

if(empty($error)) {

	require_once 'connect.php';

  $id = $_GET['id'];

	$resp = $pdo->query("DELETE FROM `categories` WHERE `id` = '$id'");
	if(!$resp) $error = 'Something went wrong!';

}

$_SESSION['cat_error'] = $error;
header("Location: " . $_SERVER['HTTP_REFERER']);

?>
