<?php
	@session_start();
	if($_SESSION['nazivUloge']!= 'Admin'){
		header('Location: index.php');
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
		
	
	
  
   
  </head>
  <body>
 		<?php
		include("konekcija.inc");
		include("header.php");
				
	
	
	$upit = "SELECT *
			 FROM testkorisnici "
			 ;
			 
	$rez = mysqli_query($konekcija,$upit );
	
	if(mysqli_num_rows($rez) == 0)
	{
		echo "Trenutno nema zapisa u bazi!";
	}
	else
	{
		?>
		
		<ul class="adminLinks">
			<?php
				$izlistajLinkove="SELECT * FROM admin ORDER BY redosled";
				$rezultatLink=mysqli_query($konekcija,$izlistajLinkove);
				while($r=mysqli_fetch_array($rezultatLink)){
					echo "<li class='user'>
							<a href='{$r['adminLink']}'>".$r['adminStavka']."</a>
						</li>";
				} 	
			?>
			</ul>
			
			<div id="admin">
			
			<form method="post" action="" >
			<table >
				<tr >
					<th class="textBox">id Zaposlenog</th>
					<th class="textBox">Ime i prezime</th>
					<th class="textBox">Korisničko ime</th>
					<th class="textBox">E-mail</th>
					<th class="textBox">Slika</th>
					<th class="textBox">Adresa</th>
					<th class="textBox">Datum rodjenja</th>
					<th class="textBox">Pol</th>
					
				</tr>
			
			<?php
		
		
while($r = mysqli_fetch_array($rez))
{
	echo "<tr>
	
			<td class='textBox'>".$r['idKorisnik']."</td>
			<td class='textBox'>".$r['imePrezime']."</td>
			<td class='textBox'>".$r['korisnickoIme']."</td>
			<td class='textBox'>".$r['emailKorisnika']."</td>
			
			<td class='textBox'><img width='100px' height='100px' 
src='".$r['slika']."'/></td>
			<td class='textBox'>".$r['adresa']."</td>
			<td class='textBox'>".@date('d.m.Y.', $r['datum_rodjenja'])."</td>
			<td class='textBox'>".$r['pol']."</td>
	
		  </tr>";
}
echo "
	 </table>
	</form>";		
		
		
}
	
	
	
	
		mysqli_close($konekcija);	
			
		?>
			
		
			


					
				  
			</div>
			</div>
		<?php
	include("footer.php");?>
	</body>
</html>