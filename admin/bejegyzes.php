<?php
	include('../config.php');
	include('../fugvenyek.php');
	$felhasznalo = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM users WHERE nickname='".$_SESSION["nickname"]."' "));
	if($felhasznalo['rank']>=2){
 		if(isset($_POST['text']) AND !empty($_POST['cikknev'])){
			mysqli_query($connect, "UPDATE bejegyzesek SET szoveg='".$_POST['text']."', updated='".date('Y-m-d H:i:s')."', ki='".$felhasznalo['user_id']."' WHERE url='".$_POST['cikknev']."' ");
			alert("Tartalom módosítva!");
			atiranyit("/admin/bejegyzesek.php?szerk=".$_POST['cikknev']);
		}elseif(isset($_POST['text']) AND !empty($_POST['cim']) AND !empty($_POST['ujbejegyzes'])){
			ujbejegyzes("file",$_POST['cim'],$_POST['text'],$_POST['url'],$felhasznalo['user_id']);
			atiranyit("/admin/bejegyzesek.php?kezeles");
		}elseif($_POST['kozzetetel']=='1'){
			mysqli_query($connect, "UPDATE bejegyzesek SET aktiv='".$_POST['kozzetetel']."' WHERE url='".$_POST['cikknev']."'");
			echo "Tartalom közzétéve!";
		}elseif($_POST['kozzetetel']=='0'){
			mysqli_query($connect, "UPDATE bejegyzesek SET aktiv='".$_POST['kozzetetel']."' WHERE url='".$_POST['cikknev']."' ");
			echo "Tartalom rejtetté téve!";
		}elseif(!empty($_GET['torol'])){
			mysqli_query($connect, "DELETE FROM bejegyzesek WHERE id='".$_GET['torol']."'");
			alert("Bejegyzés törölve!");
			back();
		}
	}
?>