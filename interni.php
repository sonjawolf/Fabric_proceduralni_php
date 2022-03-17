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
		
		include("header.php");?>
  <ul class="adminLinks">
			
				<li class='user'>
				<a href="zemlja.php">Srbija</a></li>
			<li class='user'>	<a href="region.php">Region</a></li>
					
			
			</ul>
 
		<?php	include("footer.php");?>
	</body>
</html>