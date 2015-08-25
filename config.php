<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	$mysql_host = "localhost";
	$mysql_database = "miniblog";
	$mysql_user = "miniblog";
	$mysql_password = "Miniblog00";
	$connect = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
	mysqli_query($connect, "SET NAMES utf8");
?>