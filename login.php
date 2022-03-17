<?php
	@session_start();
	include("konekcija.inc");
	
	if(isset($_REQUEST['loginButton'])){
		$korIme=trim($_REQUEST['korIme']);
		$lozinka=md5(trim($_REQUEST['lozinka']));
		
		$upitZaSpajanje="SELECT * FROM testkorisnici k 
		JOIN korisnik_uloga ku ON k.idKorisnik=ku.idKorisnik JOIN uloga u ON u.idUloga=ku.idUloga WHERE k.korisnickoIme='$korIme' AND k.lozinka='$lozinka'";
		
		$rez=mysqli_query($konekcija,$upitZaSpajanje);
		$greske=array();
		
		
		
		if(mysqli_num_rows($rez)==0){
			echo "Korisnik sa unetim imenom i lozinkom ne postoji!";
		}
		else{
			$korisnik=mysqli_fetch_array($rez);
			
			$korisnickoIme=$korisnik['korisnickoIme'];
			$imePrezime=$korisnik['imePrezime'];
			$nazivUloge=$korisnik['nazivUloge'];
			$idUloge=$korisnik['idUloga'];
			$idKorisnika=$korisnik['idKorisnik'];
			$emailKorisnika=$korisnik['emailKorisnika'];
			$slika=$korisnik['slika'];
			$adresa=$korisnik['adresa'];
			$datum_rodjenja=$korisnik['datum_rodjenja'];
			$id_grad=$korisnik['id_grad'];
			$pol=$korisnik['pol'];
			
			$_SESSION['korisnickoIme']=$korisnickoIme;
			$_SESSION['imePrezime']=$imePrezime;
			$_SESSION['nazivUloge']=$nazivUloge;
			$_SESSION['idUloge']=$idUloge;
			$_SESSION['idKorisnika']=$idKorisnika;
			$_SESSION['emailKorisnika']=$emailKorisnika;
			$_SESSION['slika']=$slika;
			$_SESSION['adresa']=$adresa;
			$_SESSION['datum_rodjenja']=$datum_rodjenja;
			$_SESSION['id_grad']=$id_grad;
			$_SESSION['pol']=$pol;
			
			setcookie($korisnickoIme, $imePrezime, time() + (86400*30), '/');
			
			switch($nazivUloge){
				case "Admin":
					header("Location: admin.php");
					break;
					
				case "Korisnik":
					header("Location: user.php");
					break;
			}	
		}
		include("zatvori.php");
	}
	if(!isset($_SESSION['idUloge'])){
		unset($_SESSION['idUloge']);
		unset($_SESSION['korisnickoIme']);
		
		session_destroy();
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
		
			include("header.php");
			?>
			
			
			
	
		<div id="login">
		<h2>Prijavite se...</h2>
			<div class="signin">
				<form action="<?php print $_SERVER['PHP_SELF'];?>" method="POST" name="form">
					<table>
						<tr>
							<td>Korisničko ime:</td>
							<td><input class="textBox" type="text" name="korIme"/></td>
						</tr>
					 	<tr>
							<td>Lozinka:</td>
							<td><input class="textBox" type="password" id="password" name="lozinka"/></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Prijavite se" id="send" class="loginButton" onClick="check()" name="loginButton"/></td>
						</tr>
						<tr>
							<td colspan="2"><p>Nemate nalog? <br/>Ukoliko ste naš zaposleni, možete se registorvati sa dodeljenim e-mailom i pristupiti dodatnim opcijama.<a href="#" class="redirect" onClick="focuser()">  Registrujte se!</a></p>
							</td>
							
						</tr>
					</table>
				</form>
				
				<?php
					if(isset($_REQUEST['loginButton'])){
						$logName=$_REQUEST['korIme'];
						$logPass=$_REQUEST['lozinka'];
						
						if(empty($logName) || empty($logPass)){
							echo "<p style='text-align:center; color:grey';>Polja ne mogu biti prazna!</p>";
						}
					}
				?>		
			</div>
				
			<div class="signin1">
				<form action="<?php print $_SERVER['PHP_SELF'];?>" method="POST" name="form1">
					<table>
						<tr>
							<td>Korisničko ime:</td>
							<td><input class="textBox" type="text" id="username" name="user"></td>
						</tr>
						<tr>
							<td>Ime i prezime:</td>
							<td><input class="textBox" type="text" id="surname" name="name"  placeholder="npr Pera Perić" onblur="checkName()"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input class="textBox" type="text" id="mail" name="email" placeholder="pera.peric@faabric.com" onBlur="checkEmail()"></td>
						</tr>
						<tr>
							<td>Lozinka:</td>
							<td><input class="textBox" type="password" id="password1" name="pass1"></td>
						</tr>
						<tr>
							<td>Lozinka ponovo:</td>
							<td><input class="textBox" type="password" id="password2" name="pass2"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="submit" value="Registrujte se" id="send" name="regButton" class="loginButton"/></td>
						</tr>
					</table>
				</form>
					<?php
						include("konekcija.inc");
						
						if(isset($_REQUEST['regButton'])){
							$korIme=$_REQUEST['user'];
							$imePrezime=$_REQUEST['name'];
							$email=$_REQUEST['email'];
							$lozinka=$_REQUEST['pass1'];
							$lozinka1=$_REQUEST['pass2'];
							
							$regImePrezime="/^[A-Z]{1}[a-z]{2,10}\s[A-Z]{1}[a-z]{2,10}$/";
							$regEmail="/^[a-z]{3,19}\.[a-z]{3,19}@faabric\.com$/";
							
							$greske=array();
							
							if(!preg_match($regImePrezime,$imePrezime)){
								$greske[]="Ime i prezime nisu u dobrom formatu!";
							}
							if(!preg_match($regEmail,$email)){
								$greske[]="Email nije u dobrom formatu!";
							}
							if($lozinka!=$lozinka1){
								$greske[]="Lozinke se moraju poklapati!";
							}
							
					if(count($greske)==0){
						
						$ubaciKorisnika="INSERT INTO testkorisnici(idKorisnik, korisnickoIme, lozinka, emailKorisnika, imePrezime, slika,adresa,datum_rodjenja,id_grad, pol) VALUES('','$korIme','".md5($lozinka)."', '$email', '$imePrezime', 'slike/idea.png','/',0,0,'/')";
						echo "Uspešno ste se registrovali!";
						mysqli_query($konekcija,$ubaciKorisnika);
					
						$ubaciUlogu="SELECT * FROM testkorisnici ORDER BY idKorisnik ASC";
						$rezultat5=mysqli_query($konekcija,$ubaciUlogu);
						while($red=mysqli_fetch_array($rezultat5)){
						$upisKU="INSERT INTO korisnik_uloga (idUloga, idKorisnik) VALUES (2, $red[0])";	
						}
						
						mysqli_query($konekcija,$upisKU);
					}
						else{
							echo "<div style='width:300px; margin:0 auto; '>";
								foreach($greske as $g){
									echo "<p style='color:grey'>$g</p>";
								}
							echo "</div>";
						
						}
				}
					?>
					
			</div>
			<div class="futer">
			<a href="index.php"><img src="img/general/logo4.png" /></a>
			</div>
			<div class="clear"></div>
	</div>
		

		
		

		
			
		
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>