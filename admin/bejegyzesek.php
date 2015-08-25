<?php
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$link = explode('?',$url);
	include('index.php'); 
	if($_SESSION['rank']>1){
		if($link[1]=="kezeles"){
			?>
				<script type="text/javascript" language="javascript" src="/js/jquery.dataTables.min.js"></script> 
				<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
				<script>
					 $(document).ready( function() {
						$('#listaz').dataTable( {
							"oLanguage":{"sUrl": "js/datatablehun.txt"}
						} );
					} )
				 </script>
				<span>
					<section class="tartalom">
						<h2>Bejegyzések kezelése</h2>

					<table align="span" id="listaz" class="fborder" style="border-collapse: collapse; font-family: 'Times New Roman'; width: 500px;">
						<thead>
							<tr class="kiemel">
								<td class="fcaption" >Cím</td>
								<td class="fcaption" ><span>Frissítve</span></td>
								<td class="fcaption" ><span>Szerkesztés</span></td>
								<td class="fcaption" ><span>Törlés</span></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$oldalak = mysqli_query($connect, "SELECT * FROM bejegyzesek  ORDER BY mikor DESC");
							while($listaz = mysqli_fetch_array($oldalak)){
								?>
									<tr>
										<td class="fcaption" ><?=$listaz['cim']?></td>
										<td class="fcaption" ><span><?=$listaz['updated']=="0000-00-00 00:00:00"?"Még nem frissített":$listaz['updated']?></span></td>
										<td class="fcaption" ><span><a href="?szerk=<?=$listaz['url']?>">Szerkesztés</a></span></td>
										<td class="fcaption" ><span><a href="bejegyzes.php?torol=<?=$listaz['id']?>" onclick="return confirm('Biztosan törlöd a bejegyzést?')">Töröl</a></span></td>
									</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					</section>
				</span>
				<?php
		}elseif($link[1]=="feltoltes"){
			?>
				<div>
					<section class="tartalom buj">
						<h2>Bejegyzés közzététele</h2>
							<script type='text/javascript' src='/ckeditor/ckeditor.js'></script>
							<form action="/admin/bejegyzes.php" enctype="multipart/form-data" action="__URL__" method="POST"><br>
								
								<label>Bejegyzés címe</label>
								<input type="text" name="cim" placeholder="Bejegyzés címének megadása"/>
								<label>Bejegyzés URL címe (Ha üresen hagyod, a rendszer kitölti!)</label>
								<input type="text" name="url" placeholder="Bejegyzés URL címének megadása"/>
								<label>Kép feltöltése</label>
								<input type="file" name="file" >
								<input type="hidden" value="1" name="ujbejegyzes">
								<textarea class="ckeditor" cols="10" id="ckeditor" name="text" rows="10" style="width: 73%;box-shadow: 0 0 10px 1px #161616;"></textarea>    
									<script type="text/javascript">
										CKEDITOR.replace( 'ckeditor' );
										CKEDITOR.add;
										CKEDITOR.config.width = 900;
										CKEDITOR.config.height = 700;
										CKEDITOR.config.skin = 'office2013';
										CKEDITOR.config.extraPlugins = 'lineheight';
										CKEDITOR.config.language = 'hu';
										CKEDITOR.plugins.setLang('lineheight','en');
									</script>
									<div>
										<input class="kuld" type="submit" value="Bejegyzés létrehozása!" />
									</div>							
								</form>
					</section>
				</div>
			<?
		}elseif(!empty($_GET['szerk'])){
			?>
				
				<div>
					<section class="tartalom">
						<?
							$lekerdez = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM bejegyzesek WHERE url='".$_GET['szerk']."'"));
							if($lekerdez['szoveg']!=''){
							?>
								<h2><?=$lekerdez['cim']?> szerkesztése</h2>
								<div class="kozzeteveszulo">
									<div class="kozzeteve"><span>Közzétéve</span></div>
									<div class="kozzeteverejtett"><span>Rejtett</span></div>
									<input class="kozzeteveinput" type="hidden" value="<?=$lekerdez['aktiv']?>" name="kozzeteve">
								</div>
								<script type="text/javascript" language="javascript" src="js/kozzetesz.js"></script>
								<script type='text/javascript' src='/ckeditor/ckeditor.js'></script>
								<form action="/admin/bejegyzes.php" method="post"><br>
									<textarea class="ckeditor" cols="10" id="ckeditor" name="text" rows="10" style="width: 73%;box-shadow: 0 0 10px 1px #161616;">
										<?php
											echo $lekerdez["szoveg"]; 
										?>
									</textarea>    
									<script type="text/javascript">
										CKEDITOR.replace( 'ckeditor' );
										CKEDITOR.add;
										CKEDITOR.config.width = 900;
										CKEDITOR.config.height = 700;
										CKEDITOR.config.skin = 'office2013';
										CKEDITOR.config.extraPlugins = 'lineheight';
										CKEDITOR.config.language = 'hu';
										CKEDITOR.plugins.setLang('lineheight','en');
									</script>
									<input type="hidden" class="cikknev" name="cikknev" value="<?=$_GET['szerk']?>"/>
									<input type="hidden" name="adminbol" value="1"/><br>
									<div>
										<input class="kuld" type="submit" name="elkuld" value="Módosítás!" />
									</div>							
								</form>
							<?
							}else{
								?>
									<br><br><h1 class="cim">Nem szerkeszthető / Nem létező cikk!</h1><br><br>
								<?
							}
							?>
					</section>
				</div>
			<?php
		}
	}
?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->