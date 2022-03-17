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
			
		if(count($greske) != 0)
	{
		foreach($greske as $g)
		{
			echo $g."<br/>";
		}
	}
	else
	{
		$upit = "SELECT vrstaIme FROM vrstaoglasa";
		
		$rez = mysqli_query( $konekcija,$upit);
		
		if(!$rez)
		{
			echo "Greska!! - ".mysqli_error();
		}
		else
		{
			$mesto = "";
			
			while($r = mysqli_fetch_array($rez))
			{
				
				
$mesto .= "<option value='".$r['vrstaIme']."'>".$r['vrstaIme']."</option>";


			}
		}
	}
			
			
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
			<form method="post" action="" enctype="multipart/form-data" name="form1">
				<table style="width:500px; margin:0 auto;">
				 <tr>
			    <td>Mesto:</td>
				<td>
<select class="textBox" style="width:145px;" name="ddlMesto">
	<option value="0">Izaberi...</option>
	<?php echo $mesto; ?>
</select>
				</td>
			 </tr>
			 <tr>
			    <td>Grad:</td>
				<td>
<input type="text" class="textBox" name="tbGrad"/>
				</td>
			 </tr>
			 
			 <tr>
			    <td>Naslov:</td>
				<td>
<input type="text" class="textBox" name="tbNaslov"/>
				</td>
			 </tr>
			 <tr>
			    <td>Sadržaj:</td>
				<td>
<textarea class="textBox" rows="10" id="mess" name="taSadrzaj"></textarea>
				</td>
			 </tr>
				<tr>
			    <td colspan="2" align="center">
 <input type="submit" value="Ubaci u bazu" class="button" name="btnSubmit11"/>
				</td>
			 </tr>	
				</table>
	 
			</form>
	  
	  <?php
	if(isset($_REQUEST['btnSubmit11']))
	{
		$mesto = $_REQUEST['ddlMesto'];
		$grad = $_REQUEST['tbGrad'];		
		$naslov = $_REQUEST['tbNaslov'];
		$sadrzaj = mysqli_real_escape_string ($konekcija,$_REQUEST['taSadrzaj']);
		
	$upit_upis = "INSERT INTO oglas VALUES('', '$mesto', '$grad', '$naslov', '$sadrzaj')";
	$rez_upis = mysqli_query($konekcija,$upit_upis);
	if(!$rez_upis)
			{
				
				echo "Greska prilikom upisa - ".mysqli_error($konekcija);
	
			}
	else
			{
				echo "Podaci su upisani!";
			}
	}
	
	mysqli_close($konekcija);
?>
	  
	  
	  
	  
			
		</div>
		
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>