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
			
			<div id="about-us">
			
			
			<div id="about">
			<div id="contact">
	<div id="contact1">

	 <h3 class="text-center"><B>Pitajte nas...</B></h3>
	
	<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="POST" name="form2">
		<table>
			
			<tr>
				<td>Ime i prezime:</td>
				<td><input class="textBox" type="text" id="surname" name="name" placeholder="npr Pera Peric" onBlur="checkName()"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input class="textBox" type="text" id="mail" name="email" placeholder="pera@gmail.com" onBlur="checkEmail()"></td>
			</tr>
			<tr>
				<td>Kontakt telefon:</td>
				<td><input class="textBox" type="text" id="telephone" name="phone" placeholder="(06x-xxxx-xxx)" onBlur="checkPhone()"></td>
			</tr>
			<tr>
				<td>Vaša poruka:</td>
				<td colspan="2"><textarea class="textBox" rows="10" id="mess" name="message"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Pošalji" name="sendButton" class="sendButton"/></td>
			</tr>
		</table>
	</form>
	<?php
						
			include("konekcija.inc");
					
				if(isset($_REQUEST['sendButton'])){
					
					$imePrezime=$_REQUEST['name'];
					$email=$_REQUEST['email'];
					$telefon=$_REQUEST['phone'];
					$poruka=$_REQUEST['message'];
					
					$regImePrezime="/^[A-Z]{1}[a-z]{2,10}\s[A-Z]{1}[a-z]{2,10}$/";
					$regEmail="/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
					$regTelefon="/^06[0-9]{1}-[0-9]{4}-[0-9]{2,}$/";
					
					$greske=array();
					
					if(!preg_match($regImePrezime,$imePrezime)){ 
						$greske[]="Ime i prezime nisu u odgovarajucem formatu!";
					}
					
					if(!preg_match($regEmail,$email)){
						$greske[]="Email nije u dobrom formatu!";
					}					

					if(!preg_match($regTelefon,$telefon)){
						$greske[]="Telefon nije u dobrom formatu!";
					}
					if(empty($poruka)){
						$greske[]="Ukucajte sadrzaj poruke!";
					}
					
					if(count($greske)==0){
						
						$to='sonja.damjanovic.111.14@ict.edu.rs';
						$subject='Poruka od: '.$imePrezime;
						$message1=$message;
						$headers='Od: '.$email.'\r\n'.
								'Odgovorite: '.$email.'\r\n'.
								'X-Mailer: PHP/'.phpversion();
								
					@mail($to,$subject,$message1,$headers);
					@header("Location:index.php#kontakt");
					echo "<div style='width:300px; margin:0 auto; '><p style='color:grey'>Poruka je uspesno poslata</p>";
					echo "</div>";
					}
					else{
					echo "<div style='width:300px; margin:0 auto; '>";
						foreach($greske as $g){
							echo "<p style='color:grey'>$g</p>";
						}
					echo "</div>";
					}
					
					
				
				
				
				
				mysqli_close($konekcija);
				
					
				}	
		?>
		
		
		</div> 

		 
						
						
						
				
         
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2838.2413806772256!2d20.428893314966516!3d44.65341979519585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDM5JzEyLjMiTiAyMMKwMjUnNTEuOSJF!5e0!3m2!1ssr!2srs!4v1517617132542"width="350" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>
         
		   <table>
		  <th> FAABRIC</th>
            <tr>
             
               <td> Ibarski put bb<br/>
                11000 Beograd</td>
            </tr>
            
            <tr><td>Telefon:+381 11 333-222<br/>
            e-mail: office@faabric.com</td></tr>
          </table>
			
		
		
          
        
          
      
			 
			
		
</div>
		
		
</div>	
			
			
			
			
			</div>
		
			
			<?php		
			include("footer.php");
		?>
	
	</body>
</html>