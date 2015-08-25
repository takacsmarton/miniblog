<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	$mysql_host = "localhost";
	$mysql_database = "miniblog";
	$mysql_user = "root";
	$mysql_password = "Buda0000";
	$connect = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
	mysqli_query($connect, "SET NAMES utf8");
	if( isset($_SESSION['rank']) AND $_SESSION['rank']>=2){
		$admin = true;
	}
?>