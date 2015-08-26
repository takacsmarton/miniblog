<?php
	session_start();
 	include("config.php");
 	$teljesdatum=date('Y-m-d H:i:s');
	date_default_timezone_set('Europe/Budapest');
	function alert($mitalert){
		echo '<script type="text/javascript">alert(\''.$mitalert.'\');</script>';
	}
	function szetbont($tartalom,$kezdet,$veg){
		$r = explode($kezdet, $tartalom);
		if (isset($r[1])){
			$r = explode($end, $r[1]);
			return $r[0];
		}
		return '';
	}
	function urledit($url){
		$mit = array('?','/','\\',"'",'"','(',')','ö','ü','ó','ő','ú','é','á','ű','í',',','.','*','+',' ');
		$mire = array('','','','','','','','o','u','o','o','u','e','a','u','i','','','','','-');
		return strtolower(str_replace($mit,$mire,strtolower($url)));
	}
	function admin() {
 		if(isset($_SESSION['rank']) AND isset($_SESSION['nickname']) AND $_SESSION['rank'] >= 2){
			$admin=true;
		}else{
			$admin=false;
		}
		return $admin;
	}
	function nickname() {
 		if(isset($_SESSION['nickname'])){
			return $_SESSION['nickname'];
		}else{
			return "";
		}
	}
	function getlink($link){
		if(isset($link)){
			return $link;
		}else{
			return "";
		}
	}
	function atiranyit($hova){
		?>
			<script type="text/javascript">
				window.location = "<?=$hova?>"
			</script>
		<?php
	}
	function vissza(){
			$URL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		?>
			<script type="text/javascript">
				window.location = "<?=$URL?>"
			</script>
		<?php
	}	
	function back(){
			$URL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		?>
			<script type="text/javascript">
				window.history.back()
			</script>
		<?php
	}

	function ujbejegyzes($fname, $cim, $szoveg, $url, $uid){
		global $connect;
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$extension = end(explode(".", $_FILES[$fname]["name"]));
		if ($_FILES[$fname]["type"] == "image/gif" || $_FILES[$fname]["type"] == "image/jpg" || $_FILES[$fname]["type"] == "image/jpeg" || $_FILES[$fname]["type"] == "image/png" && $_FILES[$fname]["size"] < 2500000 && in_array($extension, $allowedExts)) {
		  if ($_FILES[$fname]["error"] > 0) {
			alert("Hiba: " . $_FILES[$fname]["error"]);
		  }else {
			if($url==""){
				$url = urledit($_POST['cim']);
			}else{
				$url = urledit($url);
			}
			$kepnev = $url.".".pathinfo($_FILES[$fname]["name"], PATHINFO_EXTENSION);
			move_uploaded_file($_FILES[$fname]["tmp_name"], realpath(dirname(__FILE__)).'/img/blogimg/'.$kepnev);
			mysqli_query($connect, "INSERT INTO bejegyzesek (cim, szoveg, kep, url, ki, mikor) VALUES ('".$cim."', '".$szoveg."', '".$kepnev."', '".$url."', '".$uid."', '".date('Y-m-d H:i:s')."') ");
			
			alert("Bejegyzés létrehozva!");
		  }
		}else {
			alert("Hibás képformátum!");
		}
	}
	function clean($str) {
	  $str = @trim($str);
	  if(get_magic_quotes_gpc()) { $str = stripslashes($str);  }
	  return mysql_real_escape_string($str);
	}
	function email($to, $subject = '(No subject)', $message = '', $header = "FROM: EnerGym <info@energym.hu>") {
	$header .= "\r\nMIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\n";  
	  mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header); 
	} 
	function menu($link,$settings){
		?>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#page-top"><?=$settings['sitename']?></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden"><a href="#page-top"></a></li>
						<?
							global $connect;
							$menu = mysqli_query($connect,"SELECT * FROM menu WHERE megjelenik=1 ORDER BY sorrend ASC");
							while($listaz = mysqli_fetch_array($menu)){
	 
									if($listaz['elobukkano']==0){
										?>
											<li class="page-scroll"><a href="<?=$listaz['url']?>"><?=$listaz['cim']?></a></li>
										<?
									}else{
										$id = explode("#",$listaz['url']);
										?>
											<li class="page-scroll"><a href="<?=$listaz['url']?>" id="page-<?=$id[1]?>" class="portfolio-lin2k" data-toggle="modal"><?=$listaz['cim']?></a></li>
										<?
									}
									
							}
							if(nickname()!=""){
								?>
									<li class="page-scroll logout"><a href="logout.php" >Kilépés</a></li>
								<?
							}else{
								?>
									<li class="page-scroll"><a href="#login" class="portfolio-lin2k" id="page-login" data-toggle="modal">Belépés</a></li>
								<?
							}
						?>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>
		<?
	}
	function bejegyzesek(){
		?>
			<!-- Portfolio Grid Section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h2>Bejegyzések</h2>
							<hr class="star-primary">
						</div>
					</div>
					<div class="row">
							<?
								global $connect;
								$bejegyzesek = mysqli_query($connect,"
								SELECT bejegyzesek.url, bejegyzesek.mikor, bejegyzesek.cim, bejegyzesek.kep,
								users.nickname, users.email, users.avatar
								FROM bejegyzesek 
								LEFT JOIN users ON users.user_id = bejegyzesek.ki
								WHERE aktiv='1'
								ORDER BY mikor DESC
								");
								while($listaz = mysqli_fetch_array($bejegyzesek)){
									?>
										<div class="col-sm-4 portfolio-item">
											<div class="bcim"><?=$listaz['cim']?></div>
											<a href="#<?=$listaz['url']?>" class="portfolio-link" data-toggle="modal">
												<div class="caption <?=$listaz['url']?>" id="#<?=$listaz['url']?>">
													<div class="caption-content">
														<i class="fa fa-search-plus fa-3x"></i>
													</div>
												</div>
												<img src="img/blogimg/<?=$listaz['kep']?>" class="img-responsive" alt="">
											</a>
											<div class="ki"><?=$listaz['nickname']?></div>
											<div class="mikor"><?=$listaz['mikor']?></div>
										</div>
									<?
								}
							?>
					 </div>
				</div>
			</section>
		<?
	}
	function bejegyzesbovebben(){
		?>
			<!-- Portfolio Modals -->
			<div class="portfolio-modal modal fade bejegyzes" id="bid" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-content">
					<div class="close-modal" data-dismiss="modal">
						<div class="lr">
							<div class="rl">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2">
								<div class="modal-body"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?
	}
	function oldalbetolt($oldal){
		global $connect;
		$oldaladatok = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM oldalak WHERE oldal='".$oldal."'"));
		?>
			<div class="portfolio-modal modal fade oldal" id="<?=$oldaladatok['oldal']?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-content oldal">
					<div class="close-modal" data-dismiss="modal">
						<div class="lr">
							<div class="rl">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="oldal">
							<p>
								<?
									if($oldaladatok['ikon']!=""){
										?>
											<img src="<?=$oldaladatok['ikon']?>" class="oldalikon">
										<?
									}
								?>
								<div class="oldalcim"><h2><?=$oldaladatok['cim']?></h2></div>
								<div class="oldaltartalom"><?=$oldaladatok['tartalom']?></div>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?
	}
	function login(){
		if(nickname()==""){
			?>
				<script src='https://www.google.com/recaptcha/api.js'></script>
				<div class="portfolio-modal modal fade oldal" id="login" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-content oldal">
						<div class="close-modal" data-dismiss="modal">
							<div class="lr">
								<div class="rl">
								</div>
							</div>
						</div>
						<div class="container">
							<div class="oldal">
								<p>
									<img src="https://www.golivesupport.com/images/seller_login.png" class="oldalikon">
									<div class="oldalcim"><h2>Belépés</h2></div>
									<div class="login">
										Lépj be!<br>
										<form class="login" method="POST" name="login" action="login.php">
											<input type="text" placeholder="Név megadása" name="nev" required>
											<input type="password" placeholder="Jelszó megadása" name="jelszo" required>
											<div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6LfrGwgTAAAAABRZSGd2sf8u03CzwwZ8AONZcnsY"></div>
											<input type="submit" class="kuld" value="Belépés!">
										</form>
									
									</div>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?
		}
	}
?>