<?php
	include('config.php');
	include('fugvenyek.php');
	
	if(isset($_POST['bid']) AND !empty(nickname())){
		global $connect;
		$bid = $_POST['bid'];
		$bejegyzesek = mysqli_fetch_array(mysqli_query($connect, "
		SELECT bejegyzesek.szoveg, bejegyzesek.mikor, bejegyzesek.cim, bejegyzesek.kep, bejegyzesek.id,
		users.nickname, users.email, users.avatar
		FROM bejegyzesek 
		LEFT JOIN users ON users.user_id = bejegyzesek.ki
		WHERE bejegyzesek.url='".$bid."'
		"));
		
		?>
		 	<h2><?=$bejegyzesek['cim']?></h2>
				<hr class="star-primary">
				<img src="img/blogimg/<?=$bejegyzesek['kep']?>" class="img-responsive img-centered" alt="">
				<div class="btartalom"><?=$bejegyzesek['szoveg']?></div>
				<ul class="list-inline item-details">
					<li>Létrehozta:
						<strong><?=$bejegyzesek['nickname']?></strong>
					</li>
					<li>Dátum:
						<strong><?=$bejegyzesek['mikor']?></strong>
					</li>
					<h3>Hozzászólások</h3>
					<div class="hsz">
						<?
 						$hsz = mysqli_query($connect,"
						SELECT hsz.*,
						users.nickname, users.user_id
						FROM hsz 
						LEFT JOIN users ON users.user_id = hsz.ki
						WHERE hsz.bid='".$bejegyzesek['id']."'
						
						");
						while($listaz = mysqli_fetch_array($hsz)){
							?>
								<div class="hszparent">
									<div class="ki"><?=$listaz['nickname']?></div>
									<div class="mikor"><?=$listaz['mikor']?></div>
									<div class="uzent"><?=$listaz['comment']?></div>
								</div>
							<?
						}
						?>
						<h3>Szólj hozzá te is!</h3>
						<?
							if($_SESSION['nickname']!=""){
								?>
									<form method="POST" action="hszpost.php">
										<textarea placeholder="Üzenet megadása..." name="hsz" class="hsz"></textarea>
										<div name="g-recaptcha-response" class="g-recaptcha" data-sitekey="6LfrGwgTAAAAABRZSGd2sf8u03CzwwZ8AONZcnsY"></div>
										<input type="hidden" name="bid" value="<?=$bejegyzesek['id']?>">
										<input type="submit" class="kuld"value="Hozzászólás küldése!" >
									</form>
								<?
							}else{
								?>
									<p>Hozzászólás előtt lépj be!</p>
								<?
							}
						?>

					</div>
				</ul>
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Bezár</button>
		<?
	}
?>