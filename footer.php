<div id="footer">
	<div id="footerWrapper">
		<div id="network">
			<a href="http://www.facebook.com/" class="net" target="_blank"><img src="img/mreze/icon-1.png" alt="Facebook" title="Facebook"/></a>
			<a href="http://www.gmail.com" class="net" target="_blank"><img src="img/mreze/icon-4.png" alt="Gmail" title="Youtube"/></a>
			<a href="http://www.twitter.com" class="net" target="_blank"><img src="img/mreze/icon-3.png" alt="Twitter" title="Twitter"/></a>
		</div>
				
		<div id="footerDown">
			<ul>
				<?php
				include("konekcija.inc");
					$izlistajLinkove="SELECT * FROM meni";
					$rezultat7=mysqli_query($konekcija,$izlistajLinkove);
					while($r=mysqli_fetch_array($rezultat7)){
						echo "<li style='text-transform:lowercase';><a href='{$r['meniLink']}'>".$r['meniStavka']."</a></li>&nbsp|&nbsp";
					}
				?>
				<li><a href="sitemap.xml">sitemap</a></li>
				
			</ul>
		</div>
		<div id="copy">
			<p><a href="autor.php"> Sonja Damjanović 111/14</a></p>
		</div>
	</div>	
</div>