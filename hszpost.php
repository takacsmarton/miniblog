<?php
	session_start();
	include('config.php');
	include('fugvenyek.php');
	global $connect;
	
	if(isset($_POST['hsz']) AND nickname()!="" AND isset($_POST['bid'])){
		global $connect;
		$useradatok = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM users WHERE nickname='".nickname()."' "));
  		mysqli_query($connect, "INSERT INTO hsz (ki, comment, bid) VALUES ('".$useradatok['id']."', '".strip_tags($_POST['hsz'])."', '".$_POST['bid']."') ");
		alert("Sikeres hozzászólás!");
		atiranyit("/");
	}
?>