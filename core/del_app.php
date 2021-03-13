<?php 

if(isset($_GET['id']) && !empty(trim($_GET['id']))) {
	
	$id = trim($_GET['id']);

	require_once 'connect.php';

	$pdo->query("DELETE FROM `applications` WHERE `id` = '$id'");

}

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>