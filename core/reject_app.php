<?php

if(isset($_GET['id'])) {

	session_start();
  require_once 'connect.php';

	$error = '';
  $id = $_GET['id'];

	$resp = $pdo->query("UPDATE `applications` SET `status` = 2 WHERE `id` = '$id'");

}

header("Location: " . $_SERVER['HTTP_REFERER']);

?>
