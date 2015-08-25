<?php
	session_start();
	$vedelem=true;
	include('config.php');
	include('fugvenyek.php');

  	header('X-UA-Compatible: IE=edge,chrome=1');
	$link = explode('/',getlink($_GET['link']));
    $oldaladatok = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM oldalak WHERE oldal='".$link[0]."'"));
 	$settings = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM settings WHERE id='1'"));
	$oldalurl = $settings['url'];
 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/freelancer.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="/css/kepvalto.css">
		<meta charset="utf-8">
		<title><?=$oldaladatok['title']?></title>
		<meta http-equiv="Cache-control" content="public">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?=$oldaladatok['metaleiras']?>">
		<meta name="keywords" content="<?=$oldaladatok['kulcsszavak']?>">
		<meta name="author" content="Buda">
		<meta name="robots" content="index, follow, archive">
		<meta name="author" content="Miniblog" />
		<meta name="subject" content="<?=$oldaladatok['metaleiras']?>" />
		<meta name="classification" content="<?=$oldaladatok['metaleiras']?>" />
		<meta name="generator" content="Miniblog" />
		<meta name="geography" content="Hungary" />
		<meta name="language" content="Hungarian" />
		<meta name="copyright" content="Miniblog.hu" />
		<meta name="designer" content="atakacsmarton" />
		<meta name="publisher" content="Miniblog" />
		<meta name="revisit-after" content="10 days" />
		<meta name="distribution" content="Global" />
		<meta name="city" content="Budapest" />
		<meta name="country" content="Hungary" />
		
		
		<meta property="og:site_name" content="<?=$oldalurl?>">
		<meta property="og:locality" content="Budapest">
		<meta property="og:locale" content="hu_HU">
		<meta property="og:type" content="website">
		<link href="/img/icon.png" rel="icon" type="image/x-icon">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/miniblog.js"></script>
	</head>
	<body id="page-top" class="index">
		<?
		if(admin()){
			?>
				<div class="admingomb"><a href="/admin">Adminpanel</a></div>
			<?
		}
		menu($link[0],$settings)
		?>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img class="img-responsive" src="img/icon.png" alt="">
						<div class="intro-text">
							<span class="name"><?=$oldaladatok['cim']?></span>
							<hr class="star-light">
							<span class="skills"><?=$oldaladatok['tartalom']?></span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?
			bejegyzesek();
			oldalbetolt("adatlap");
			oldalbetolt("kapcsolat");
			login();
		?>              
		<!-- Footer -->
		<footer class="text-center">
			<div class="footer-above">
				<div class="container">
					<div class="row">
						<div class="footer-col col-md-4">
							<h3>Telephely</h3>
							<p>1234 Budapest<br>Előd utca 44.</p>
						</div>
						<div class="footer-col col-md-4">
							<h3>Keress itt is minket</h3>
							<ul class="list-inline">
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
								</li>
								<li>
									<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
								</li>
							</ul>
						</div>
						<div class="footer-col col-md-4">
							<h3>Keress elérhetőségeink egyikén!</h3>
							<p>Vedd fel velünk a kapcsolatot, küldj be cikket, blogolj...</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-below">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							Copyright &copy; <?=$settings['sitename']?> - <?=date("Y")?>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<div class="scroll-top page-scroll visible-xs visible-sm">
			<a class="btn btn-primary" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>
		<?=bejegyzesbovebben()?>
		
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/cbpAnimatedHeader.js"></script>
		<script src="js/jqBootstrapValidation.js"></script>
		 <script src="js/freelancer.js"></script>
	</body>
</html>