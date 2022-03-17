<?php
	@session_start();
?>

<div id="header">
			<div id="logo">
				<div id='headerLeft'>	
					<div id="logoText">
						<br>
						
						<a href="index.php"><img src="img/general/logo4.png"/></a>
						</h1>
						
					</div>
				</div>
				<div id='headerRight'>	
					
					<div id='roles'> 
						<table>
							<tr>
								<td>
								<?php
									if(isset($_SESSION['idUloge']) && $_SESSION['nazivUloge']=='Admin'){
										echo "<span class='account'><a href='admin.php'>Administrator</a> </span>";
									}
								?>
								</td>
								<td>
									<?php
										if(isset($_SESSION['idUloge'])){
											echo "<span class='account'> &nbsp<a href='user.php'>".$_SESSION['korisnickoIme']."(Profil)</a></span>";
										}
									?>	
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="clear"></div>
					
		<?php
			$konekcija=mysqli_connect("localhost","root","","faabric");
		
			include("meni.php");
		?>
</div>