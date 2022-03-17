<?php
	@session_start();
?>
<div id="meni">
	<ul class="nav">
		<?php
			include("konekcija.inc");
			
			$izlistajKategorije="SELECT * FROM meni ORDER BY redosled";
			$rezultat=mysqli_query($konekcija,$izlistajKategorije);
			while($r=mysqli_fetch_array($rezultat)){
				echo "<li class='meniLi' id='link{$r['idMeni']}'>
					<a href='{$r['meniLink']}' class='meniA'>".$r['meniStavka']."</a>
				</li>";
			} 
		?>
		<?php
			if(!isset($_SESSION['idUloge'])){
				echo "<li class='meniLi'><a href='login.php' class='meniA'>LogIn</a></li>";
			}
			else{
				echo "<li class='meniLi'><a href='logout.php' class='meniA'>LogOut</a></li>";		
			}
		?>
			 
		
	</ul> 			
</div> 
	