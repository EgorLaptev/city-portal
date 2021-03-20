<?php

if(isset($_GET['id'])) {

	session_start();

	require_once 'connect.php';

	$error 	= '';
	$id 	= $_GET['id'];
	$photo  = addslashes(file_get_contents($_FILES['photo']['tmp_name']));


	$resp = $pdo->query("UPDATE `applications` SET `status` = 1, `solution` = '$photo' WHERE `id` = '$id'");

}

header("Location: " . 'http://city-portal/admin.php');

?>
