<?php @session_start(); ?>
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
			
			<?php @session_start(); ?>
<div id="about-me">
		<h2>Nešto o meni...</h2>
		<div id='authorWrap'>
			<?php
				include("konekcija.inc");
					$izlistaj="SELECT * FROM autor";
					$rezultat4=mysqli_query($konekcija,$izlistaj);
					while($r=mysqli_fetch_array($rezultat4)){
						echo "<div id='about-me-images'>
								<img src='".$r['imgAutor'].".jpg' alt='".$r['altImg']."' width='150px' height='200px'
							</div>";
					}
			?>
								
			<div id="about-me-text">
				<p>Ja sam Sonja Damjanović, student Visoke ICT škole</p>
				<p>Nešto na šta sam najponosnija što sam postigla u životu je da sam član <b>Mensa Srbija</b>.  Oduvek volim da putujem, čitam.  Obožavam prirodu. Le chats. Da kuvam. Od skora učim da se navikavam na promene. Gravitiram ka moru i suncu.
				
				</p>
				
				<p>Email: <a href="mailto:sonja.damjanovic.111.14@ict.edu.rs"> sonja.damjanovic.111.14@ict.edu.rs</a></p>
			</div>
		</div>	
</div>
		
		<div class="clear"></div>
</div>			
			
			
			
		
		<div class="clear"></div>
</div>

		 	
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>



