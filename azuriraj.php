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
  <body>
 		<?php
		
			include("header.php");
			?>		
			
	 
	<?php
	include("konekcija.inc");
	include("funkcije.inc");	
	
	if(count($greske) != 0)
	{
		foreach($greske as $g)
		{
			echo $g."<br/>";
		}
	}
	else
	{
		$upit = "SELECT id_grad, naziv_grada FROM gradovi";
		
		$rez = mysqli_query( $konekcija,$upit);
		
		if(!$rez)
		{
			echo "Greska!! - ".mysqli_error();
		}
		else
		{
			$gradovi = "";
			
			while($r = mysqli_fetch_array($rez))
			{
				
				
$gradovi .= "<option value='".$r['id_grad']."'>".$r['naziv_grada']."</option>";


			}
		}
	}
?>
	 <div class="login">
	 
	 
	 
	 
<form method="post" action="" enctype="multipart/form-data" name="form1">
<br/>
<br/>
<br/>
<h2>Podaci o zaposlenom</h2>
<br/>
<br/>
<br/>
	     <table style="width:500px; margin:0 auto;">
		     
			 
			 <tr>
			    <td>Adresa:</td>
				<td>
<input type="text" class="textBox" name="tbAdresa"/>
				</td>
			 </tr>
			 <tr>
			    <td>Datum rođenja:</td>
				<td>
<select class="dan" name="ddlDan">
	<option value="0">Dan</option>
	<?php echo lista_dana(); ?>
</select>

<select class="dan" name="ddlMesec">
	<option value="0">Mesec</option>
	<?php echo lista_meseci(); ?>
</select>

<select class="dan" name="ddlGodina">
	<option value="0">Godina</option>
	<?php echo lista_godina(); ?>
</select>
				</td>
			 </tr>
			 <tr>
			    <td>Grad:</td>
				<td>
<select class="textBox" style="width:145px;" name="ddlGrad">
	<option value="0">Izaberi...</option>
	<?php echo $gradovi; ?>
</select>
				</td>
			 </tr>
			 <tr>
			    <td>Pol:</td>
				<td>
<input type="radio" name="rbPol" value="M"/> Muški <br/>
<input type="radio" name="rbPol" value="Z"/> Ženski <br/>
				</td>
			 </tr>
		
			 <tr>
			    <td colspan="2" align="center">
 <input type="submit" value="Prijavi" class="button" name="btnSubmit1"/>
				</td>
			 </tr>
		 </table>
	  
	  </form>
	  
	  
	  
	  </div>
	  
	  
<?php
	if(isset($_REQUEST['btnSubmit1']))
	{
		
		$adresa = $_REQUEST['tbAdresa'];
		
		$dan = $_REQUEST['ddlDan'];
		$mesec = $_REQUEST['ddlMesec'];
		$godina = $_REQUEST['ddlGodina'];
		
		@$datum = mktime(0, 0, 0, $mesec, $dan, $godina);
		
		
		$id_grad = $_REQUEST['ddlGrad'];
		$pol = $_REQUEST['rbPol'];
	
	
	
	$upit_upis = "UPDATE testkorisnici
	SET  adresa='".$adresa."', datum_rodjenja='".$datum."', id_grad='".$id_grad."', pol='".$pol."'
	
	WHERE idKorisnik=".$_SESSION['idKorisnika'];
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

?>

		<form  method="POST" action="" enctype="multipart/form-data" >
						<table style="width:500px; margin:0 auto;">
						<tr>
			<td>Profilna Fotografija:</td>
								<td>
									<input type="file" class="textBox" name="fSlika"/>
								</td>
			</tr>
							
							<tr> 
								 <td colspan="2" align="center">
									<input type="submit" name="btnSubmit" value="POSTAVI" class="addPicButton">
								</td>
							</tr> 
						</table> 
					</form>  

	<?php
	if(isset($_REQUEST['btnSubmit']))
	{
		
		
		$imeSlike = $_FILES['fSlika']['name'];
		$tmpSlike = $_FILES['fSlika']['tmp_name'];
		
		
		$putanjaSlike = "slike/".$imeSlike;
		
		if(move_uploaded_file($tmpSlike, $putanjaSlike))
		{
			$upit_upis1 = "UPDATE testkorisnici
	SET  slika='".$putanjaSlike."' WHERE idKorisnik=".$_SESSION['idKorisnika'];
			
			$rez_upis = mysqli_query($konekcija,$upit_upis1 );
			
			if(!$rez_upis)
			{
				
				echo "Greska prilikom upisa - ".mysqli_error();
	
			}
			else
			{
				echo "Podaci su upisani!";
			}
			
			
		}
		else
		{
			echo "Greska prilikom upload-a slike!".mysqli_error($konekcija);
		}
		
	}
	
	
	mysqli_close($konekcija); 
?>
		
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>

