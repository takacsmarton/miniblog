<?php
	session_start();
	include('config.php');
	include('fugvenyek.php');
	global $connect;
	
	if(isset($_POST['nev']) AND isset($_POST['jelszo'])){
  		$login = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id, nickname, rank FROM users WHERE nickname='".$_POST['nev']."' AND password ='".md5($_POST['jelszo'])."'"));
		if($login['user_id']!="" AND !empty($_POST['g-recaptcha-response'])){
			$_SESSION['nickname'] = $login['nickname'];
			$_SESSION['rank'] = $login['rank'];
			alert("Sikeres belépés!");
			back();
		}elseif(empty($_POST['g-recaptcha-response'])){
			alert("A biztonsági ellenőrzés nem sikerült!");
			back();
		}else{
			alert("Hibás adatok!");
			//back();
		} 
	}
?>