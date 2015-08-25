<?php
	include('../config.php');
	include('../fugvenyek.php');
 	global $connect;
	if(admin()){
		?>
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
				<link href="/img/icon.png" rel="icon" type="image/x-icon">
				<title>Adminpanel</title>

				<!-- Bootstrap Core CSS -->
				<link href="css/bootstrap.min.css" rel="stylesheet">

				<!-- Custom CSS -->
				<link href="css/sb-admin.css" rel="stylesheet">

				<!-- Morris Charts CSS -->
				<link href="css/plugins/morris.css" rel="stylesheet">

				<!-- Custom Fonts -->
				<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

				<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
					<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->

			</head>

			<body>

				<div id="wrapper">

					<!-- Navigation -->
					<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="/admin">Adminpanel</a>
						</div>
						<!-- Top Menu Items -->
						<ul class="nav navbar-right top-nav">
							<li>
								<a href="#" class="user"><i class="fa fa-user"></i><?=nickname()?></a>
							</li>
						</ul>
						<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav side-nav">
							
								<li class="active"><a href="index.php">Kezdőlap</a></li>
								<li><a href="/">Vissza az oldalra</a></li>
								<li class="szulo">Bejegyzések</li>
								<li><a href="bejegyzesek.php?kezeles">Kezelése</a></li>
								<li><a href="bejegyzesek.php?feltoltes">Új bejegyzés</a></li>
								<li class="szulo">Kijelentkezés</li>
								<li><a href="/logout.php">Kilépek</a></li>
							
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</nav>

					<div id="page-wrapper">

						<div class="container-fluid">

							<!-- Page Heading -->
							<div class="row">
								<div class="col-lg-12">
									<h1 class="page-header">
										Miniblog adminpanel 
									</h1>
									<ol class="breadcrumb">
										<li class="active">
											<i class="fa fa-dashboard"></i> Kezdőlap
										</li>
									</ol>
								</div>
							</div>
							<!-- /.row -->

							<div class="row">
								<div class="col-lg-12">
									<div class="alert alert-info alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="fa fa-info-circle"></i>  <strong>Válassz a bal oldali menüpontból!</strong>
									</div>
								</div>
							</div>
							<!-- /.row -->

							<div class="row">

				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.min.js"></script>
			</body>
		</html>
	<?
	}else{
		atiranyit("/");
	}
?>