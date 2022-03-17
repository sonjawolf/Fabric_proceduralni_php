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
		
	
	
  
   
  </head>
  <body><?php
		include("konekcija.inc");
		include("header.php");
		
				
	
	
	$upit = "SELECT *
			 FROM oglas WHERE vrstaIme='Srbija'";
			 
	$rez = mysqli_query($konekcija,$upit );
	
	if(mysqli_num_rows($rez) == 0)
	{
		echo "Trenutno nema zapisa u bazi!";
	}
	else
	{
		?>
				<ul class="adminLinks">
			
				<li class='user'>
				<a href="zemlja.php">Srbija</a></li>
			<li class='user'>	<a href="region.php">Region</a></li>
					
			
			</ul>
		
			
			<div id="admin">
			
			<form method="post" action="" >
			<table >
				<tr >
					<th class="textBox">idOglasa</th>
					<th class="textBox">Mesto</th>
					<th class="textBox">Grad</th>
					<th class="textBox">Naslov</th>
					<th class="textBox" >Sadrzaj</th>
				</tr>
			
			
			
		<?php
		
while($r = mysqli_fetch_array($rez))
{
	echo "<tr>
	
			<td class='textBox'>".$r['idOglas']."</td>
			
			<td class='textBox'>".$r['vrstaIme']."</td>
			<td class='textBox'>".$r['grad']."</td>
			<td class='textBox'>".$r['naslov']."</td>
			<td class='textBox' >".$r['sadrzaj']."</td>
			
		


			
		  </tr>";
}
echo " </table>
	</form>";		
		
		
}
	
	
	
	mysqli_close($konekcija);	
			
		?>
		
			</div>
		<?php	include("footer.php");?>
	</body>
</html>