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
				
	if(isset($_REQUEST['btnBrisi']))
	{
		
		$za_brisanje = $_REQUEST['brisanje'];
		
		foreach($za_brisanje as $id)
		{
			$upit_brisanje = "DELETE FROM oglas WHERE idOglas=".$id;
			mysqli_query($konekcija,$upit_brisanje);
		}
	}
	
	$upit = "SELECT *
			 FROM oglas "
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
			
			<form method="post" action="brisanjeOglasa.php" >
			<table >
				<tr >
					<th class="textBox">idOglasa</th>
					<th class="textBox">Mesto</th>
					<th class="textBox">Grad</th>
					<th class="textBox">Naslov</th>
					<th class="textBox" '>Sadrzaj</th>
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
			
		

<td ><input type='checkbox' name='brisanje[]' 
value='".$r['idOglas']."'> </td>
			
		  </tr>";
}
echo "<tr>
		<td colspan='5' align='center' class='textBox'>
		
			<input type='submit' name='btnBrisi' value='Izbrisi' class='button'/>
			
		</td>
	  </tr>
	 </table>
	</form>";		
		
		
}
	
	
	
	mysqli_close($konekcija);
		
			
		?>
			</div>
		<?php
	include("footer.php");?>
	</body>
</html>