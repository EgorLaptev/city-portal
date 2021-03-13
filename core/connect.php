<?php

$db_host = 'localhost';
$db_name = 'wsrq';
$db_char = 'utf8';
$db_user = 'root';
$db_pass = 'root';

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_char;";

$pdo = new PDO($dsn, $db_user, $db_pass);

?>
