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
			?>
			
			<div id="admin">
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
		</div>
		
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>