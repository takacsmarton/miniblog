<?php
	session_start();
	$vedelem=true;
	include('config.php');
	//include('fugvenyek.php');

	$felhasznalo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE nickname='".$_SESSION["nickname"]."' "));
	statisztika();
	header('X-UA-Compatible: IE=edge,chrome=1');
	$mobilverzio = mobil('mobile');
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$link = explode('/',$_GET['link']);
	if(empty($link[0])){
		$link[0]='fooldal';
	}
	if($nyelvbetolt=="hu"){
		$_SESSION['nyelv']="hu";
	}elseif($nyelvbetolt=="en"){
		$_SESSION['nyelv']="en";
	}
	$admine = $_SESSION['rank'];
	if(empty($link[0]) OR $link[0]=='fooldal'){
		$link[0]='fooldal';
		$oldaladatok = mysql_fetch_assoc(mysql_query("SELECT * FROM oldalak WHERE ".oldalnyelv()."='fooldalseo' "));
	}elseif(!empty($link[0]) AND $link[1]=='galeria'){
		$oldaladatok['title']="Galéria";
		$oldaladatok['metaleiras']="EnerGym Füredi úti edzőterem galériája";
		$oldaladatok['kulcsszavak']="galéria, képek";
	}else{
		if($link[0]=='furedi' AND empty($link[1]) OR $link[0]=='egyetemi' AND empty($link[1])){
			$oldaladatok = mysql_fetch_assoc(mysql_query("SELECT * FROM oldalak WHERE ".oldalnyelv()."='fooldal' AND terem='".$link[0]."' "));
		}else{
			$oldaladatok = mysql_fetch_assoc(mysql_query("SELECT * FROM oldalak WHERE oldal_hu='".$link[1]."' AND terem='".$link[0]."' OR oldal_en='".$link[1]."' AND terem='".$link[0]."' "));
		}
	}
	if($link[0]=='furedi'){
		$teremnev = "EnerGym";
	}elseif($link[0]=='egyetemi'){
		$teremnev = "EnerGym 2";
	}
	if($link[1]=='galeria'){ // Ha galéria, új class|div -et kap, elrejti a képváltót, kepvalto border feltol, headerszulo magassag beállít
		$galeriaheaderszulo = 'galeriaheaderszulo';
		$galeriawowslider = 'galeriawowslider';
		$galeriakepvaltoborder = 'galeriakepvaltoborder';
	}else{
		$galeriaheaderszulo = 'headerszulo';
		$galeriawowslider = 'wowslider-container1';
		$galeriakepvaltoborder = 'kepvaltoborder';
	}

	include("nyelv.php");
?>

<!--[if gt IE 8]><!--> <html class="no-js" xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu"> <!--<![endif]-->
<head>
	<link rel="stylesheet" href="/css/style.css">
	<link href="/css/menu.css" rel="stylesheet" type="text/css">
	<!--[if IE]><link href="/css/iemenu.css" rel="stylesheet" type="text/css"><![endif]-->
	<!--[if IE]><link href="/css/iestyle.css" rel="stylesheet" type="text/css"><![endif]-->
	<link rel="stylesheet" href="/css/kepvalto.css">
	<meta charset="utf-8">
	<title><?=$oldaladatok['title']?></title>
	<meta http-equiv="Cache-control" content="public">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?=$oldaladatok['metaleiras']?>">
	<meta name="keywords" content="<?=$oldaladatok['kulcsszavak']?>">
	<meta name="author" content="Buda">
	<meta name="robots" content="index, follow, archive">
	<meta name="author" content="EnerGym" />
	<meta name="subject" content="<?=$oldaladatok['metaleiras']?>" />
	<meta name="classification" content="<?=$oldaladatok['metaleiras']?>" />
	<meta name="generator" content="EnerGym" />
	<meta name="geography" content="Hungary" />
	<meta name="language" content="Hungarian" />
	<meta name="copyright" content="energym.hu" />
	<meta name="designer" content="bioferet.hu" />
	<meta name="publisher" content="Energym" />
	<meta name="revisit-after" content="10 days" />
	<meta name="distribution" content="Global" />
	<meta name="city" content="Budapest" />
	<meta name="country" content="Hungary" />
	
	
	<meta property="og:site_name" content="<?=$oldalurl?>">
	<meta property="og:locality" content="Budapest">
	<meta property="og:locale" content="hu_HU">
	<meta property="og:type" content="website">
	<script src="/js/jquery-1.11.1.js" type="text/javascript"></script>

	<?php
		$oldal = mysql_fetch_assoc(mysql_query("SELECT * FROM menu WHERE url_hu='/".$link[1]."' AND terem='".$link[0]."' OR url_en='/".$link[1]."' AND terem='".$link[0]."'"));
 		if($admine>=2){
			?>
 				<script src="http://cdn.ckeditor.com/4.4.7/full/ckeditor.js"></script>
			<?
		}
		if(!empty($link[0]) AND !empty($link[1])){
			?>
				<link rel="alternate" hreflang="hu-hu" href="<?=$oldalurl?><?=$link[0]?><?=$oldal['url_hu']?>">
				<link rel="alternate" hreflang="en-en" href="<?=$oldalurl?><?=$link[0]?><?=$oldal['url_en']?>">
			<?
		}
	?>

 	<link href="/kepek/logo.png" rel="icon" type="image/x-icon">
	<script type='text/javascript' src='/js/energym.js'></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<? if($css==1){ ?><link rel="stylesheet" href="<?=$oldalurl?>css/furedi.css"/>
	<? }else{?><link rel="stylesheet" href="<?=$oldalurl?>css/egyetemi.css"/><?} ?>

</head>
<body>
<div class="oldalsav">
		<?=oldalsavfacebook($link[0])?>		
</div>
<a href="https://plus.google.com/x" rel="publisher"></a>
<div id='felsoszoveg' class='felsoszoveg'>
	<span>THERE IS NO NEXT TIME, IT IS NOW OR NEVER</span>
</div>	
	<div id='nagykepszulo' class='nagykepszulo'></div>
	<div id="<?=$galeriaheaderszulo?>">
		<img src="/kepek/slider.next.png" class="nyil">
		<span class="melyikterem"><?=$melyikterem?></span>
		<div class="fooldal logo">
			<a href="<?=$oldalurl?>"><img alt="logo" src="/kepek/logo.png"></a>
		</div>
		<header>
			<?php
				menu($oldalurl,$link[0],$link[1]);
				kepvalto($link[0], $galeriawowslider, $galeriakepvaltoborder); 
			?>
		</header>
	</div>
	<div id="tartalom">
		
			<?php //echo $link[0];
			
				if(!empty($link[0]) OR !empty($link[1])){
					$teljeshossz = 'style="width:100%"';
				}
				if($link[0]=="hu"){
					nyelv("hu");
					atiranyit($oldalurl);
				}elseif($link[0]=="en"){
					nyelv("en");
					atiranyit($oldalurl);
				}
				if($link[0]=='fooldal'){
					getFooldal($oldalurl,$admine,$link[0],$jelszo);
				}elseif($link[1]=="v2"){
					getFooldal2($oldalurl,$admine);
				}elseif($link[1]=="regisztracio"){
					regisztracio($oldalurl);
				}elseif($link[1]=="galeria" AND empty($link[2]) OR $link[1]=="gallery" AND empty($link[2])){
					galeria($oldalurl,$admine,$_SESSION['nyelv'],$link[0],$kattnagyobbmerethez);
				}elseif($link[1]=="galeria" AND !empty($link[2])){
					$seonev = mysql_fetch_assoc(mysql_query("SELECT nev FROM galeriamappa WHERE seonev='".$link[1]."' "));
					galeria2($oldalurl,$admine,$seonev['nev']);
					//alert(utfbetu(false,$link[1]));
				}elseif($link[1]=="kapcsolat" OR $link[1]=="contact"){
					kapcsolat($oldalurl,'kapcsolat',$link[0],$cimkapcsolat,$link[0]);
				//}elseif($link[1]=="araink" AND $link[0]=="egyetemi" OR  $link[0]=="egyetemi" AND $link[1]=="prices"){
					//araink($oldalurl,$link[0],$link[1]);	
				}elseif($link[1]=="404" OR $link[1]=="403"){
						echo'<article class="cikk" '.$teljeshossz.'><div class="hiba">
									<tr>
									<span style="color:red;font-weight:bold;font-size:20px;">Hiba, nincs ilyen oldal, tartalom!</span><br><br>
									<img alt="" src="/kepek/hiba.png" style="width: 300px; height: 254px;" >
									</tr>
							</div></article>
							';
				}else{
					$oldaladatok = mysql_fetch_assoc(mysql_query("SELECT * FROM oldalak WHERE oldal_hu='".$link[1]."' AND terem='".$link[0]."' OR oldal_en='".$link[1]."' AND terem='".$link[0]."' "));
					if($link[0]=="furedi"){
						if(empty($link[1])){
							furedifooldal($oldalurl,$link[0],$fooldalcim,$jelszo);
						}else{
							if(empty($oldaladatok["id"])){
								hiba($oldalurl,$link[0],$jelszo);
							}else{ 
								tartalom($oldaladatok,$jelszo);
							}
						}
					}elseif($link[0]=="egyetemi" ){
						if(empty($link[1])){
							egyetemifooldal($oldalurl,$link[0],$fooldalcim,$jelszo);
						}else{
							if(empty($oldaladatok["id"])){
								hiba($oldalurl,$link[0],$jelszo);
							}else{ 
								tartalom($oldaladatok,$jelszo);
							}
						}
					}

				}
				imgclick();
				?>
	</div>
	<div class="mainborder"></div>
	<?=footer($fooldal,$footerh2,$footerh22,$cim,$energym,$energym2,$cimfooter,$cimfooter2,$nyitvatartas,$nyitvatartas2,$egyebelerhetoseg,$tel,$tel2)?>
	<h4 style="position:absolute;margin-top:-99999px;">Fitness Debrecen</h4>
	<h5 style="position:absolute;margin-top:-99999px;"><?=$teremnev?> Fitness Debrecen</h6>
</body>
</html>
