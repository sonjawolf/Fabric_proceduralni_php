<html>
	<body>	
		<div id="homeGallery1">
		
		<div id="homeGallery">
			<?php
				$izlistajSlajder="SELECT * FROM slajder";
				$rezultatSlajder=mysqli_query($konekcija,$izlistajSlajder);
				while($r=mysqli_fetch_array($rezultatSlajder)){
					echo "<img class='show' src='".$r['pathSlajd']."' alt='".$r['altSlajd']."'>";
				}
			?>		
		</div>
		</div>
		<script>slider();</script>
	</body>
</html>