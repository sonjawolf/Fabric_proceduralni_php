<?php
	@session_start();
	if(!isset($_SESSION['nazivUloge'])){
		header("Location:index.php");
	}
?>

<html>
  <head>
    <title>FAABRIC</title>
	<meta name="description" content="Tekstilna kompanija FAABRIC iz Srbije"/>
		<meta name="keywords" content="teksitl,moda, fashion, odeća, obuća, posao, biografija"/>
		<meta name="author" content="sonja.damjanovic.111.14@ict.edu.rs"/>
		<link rel="shortcut icon" href="slike/icon.png"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="still.css"/>
	<script src="jquery-1.12.1.min.js"></script>
		<script src="jquery.js"></script>
		<script src="script.js"></script>
		
	<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css"/>
		<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	
  
   
  </head>
  <body>
 		<?php
			include("konekcija.inc");
			include("header.php");
			?>
	
			
			
					<div id="user">
			<div class="left linije">
				<table >
					<tr>
						<td class="col1">KORISNIČKO IME</td>
						<td class="col2">
							<?php
								if(isset($_SESSION['idUloge'])){
									echo $_SESSION['korisnickoIme'];
								}
							?>
						</td>	
					</tr>
					<tr>
						<td class="col1">IME I PREZIME</td>
						<td class="col2">
							<?php
								if(isset($_SESSION['imePrezime'])){
									echo $_SESSION['imePrezime'];
								}
							?>
						</td>	
					</tr>
					<tr>
						<td class="col1">EMAIL</td>
						<td class="col2">
							<?php
								if(isset($_SESSION['emailKorisnika'])){
									echo $_SESSION['emailKorisnika'];
								}
							?>
						</td>
					</tr>
					<tr>
						<td class="col1">ULOGA</td>
						<td class="col2">
							<?php
								if(isset($_SESSION['idUloge'])){
									echo $_SESSION['nazivUloge'];
								}
							?>
						</td>
					</tr>
					
				</table>
				
				<div class="formular">
				
				
			<p><a href="azuriraj.php">Ažurirajte svoj profil</a></p>
			<br/>
			<br/>
			<br/>
			
			<p><a href="interni.php">Interni oglasi za posao</a></p>
				</div>
				
			</div>
			
			
			<div class="right">
				<?php
					$upitSlika="SELECT * FROM testkorisnici WHERE idKorisnik=".$_SESSION['idKorisnika'];
					$rezultatSlike=mysqli_query($konekcija,$upitSlika);
					while($r=mysqli_fetch_array($rezultatSlike)){
						echo "<img width='350px' src='".$r['slika']."'/>";
					}
				?>
				
			
					
				 
			</div>
			
			
		<div class="anketa">
		 
	<form method="POST" action='user.php'>
		<table class="zaAnketu">
			<?php
				include("konekcija.inc");
				
				$pitanjeUpit="SELECT * FROM anketa WHERE aktivna=1";
				$pitanjeRez=mysqli_query($konekcija,$pitanjeUpit);
				while($r=mysqli_fetch_array($pitanjeRez)){ 
					echo "<tr ><td class='textBox'> {$r['pitanja']} </td></tr>"; 
				} 
				$odgovorUpit="SELECT * FROM odgovori o JOIN anketa a ON o.idAnketa=a.idAnketa ";
				$odgovorRez=mysqli_query($konekcija,$odgovorUpit);
				while($r=mysqli_fetch_array($odgovorRez)){
					echo "<tr ><td class='textBox'> <input type='radio' name='odgovori' value='{$r['idOdgovori']} '/>{$r['odgovor']}</td></tr>"; 
				}
			?>
			<tr class='answer'><td><input type='submit' class="adBtn" value='Glasaj' name='btnGlasaj'/>
			<input type='submit'  class="adBtn" value='Rezultat' name='btnRezultat'/></td></tr>
		</table>
	</form>
	<?php
	if(isset($_REQUEST['btnGlasaj'])){
			$vrednostKolacica=$_SESSION['idKorisnika'];
			@$odgovorIzForme=$_POST['odgovori'];
			$napisiOdg="UPDATE rezultat SET rezultat=rezultat+1 WHERE idOdgovori=".$odgovorIzForme;
			$napisiOdgUpit=mysqli_query($konekcija,$napisiOdg);
			if($napisiOdgUpit){ 
				if (!isset($_SESSION['glasao'])){  
					$_SESSION['glasao']=$vrednostKolacica;
					echo "<p class='answer'>Hvala što ste glasali</p>";   
				 
				} 
				else{
					echo "<p class='answer'>Već ste glasali</p>";		
					$obrisiGlas="UPDATE rezultat SET rezultat=rezultat-1 WHERE idOdgovori=".$odgovorIzForme;
					$napisiOdgUpit=mysqli_query($konekcija,$obrisiGlas);	 
 
				} 
			} 
			if(!isset($odgovorIzForme)){
				echo "<p class='answer'>Izaberite jedno od ponudenih odgovora</p>";
			}	
		}
		if(isset($_REQUEST['btnRezultat'])){
			$rezultatGlasanja="SELECT * FROM anketa a JOIN odgovori o ON a.idAnketa=o.idAnketa WHERE aktivna=1";
			$izvrsiRezultat=mysqli_query($konekcija,$rezultatGlasanja);
			$r=mysqli_fetch_array($izvrsiRezultat);
				
			$id=$r['idAnketa'];
			echo "<table>"; 
			echo "<tr class='textBox'>
					<td colspan='2' class='textBox'>Vaš odgovor je:  {$r['odgovor']} <br/>Anketa</td>
				</tr>";
			
			$rezultatUpit="SELECT o.odgovor,r.rezultat FROM odgovori o, rezultat r WHERE o.idOdgovori=r.idOdgovori AND r.idAnketa=".$id;

			$uzmiOdgovor=mysqli_query($konekcija,$rezultatUpit);	
			
			while($r=mysqli_fetch_array($uzmiOdgovor)){
				echo "<br/>
					<tr align=center class='textBox'><td class='textBox'>{$r['odgovor']} </td>
						<td class='textBox'>{$r['rezultat']}</td>
					</tr>
				";
			}	
			echo "</table>";
		}	
		?>
		
		
	</div>
	
	
			
			<div class="clear"></div>
		</div>
			
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>