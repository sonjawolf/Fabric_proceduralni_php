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
	
		<script src="script.js"></script>
		
		
		
<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen"/>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.lightbox-0.5.min.js"></script>
<script>
	$(document).ready(function()
	{
		$('#thumbnails a img').lightBox();
	});
  </script>
   
  </head>
  <body>
 		<?php
		
			include("header.php");
			?>
			
			
					<div id="galerija ">
	
		<?php
			$id=1;
				if(isset($_POST['id'])){
					$id=$_POST['id'];
				}
			$redovaPoStrani=3;
				$trenutnaStrana=1;
				if(isset($_POST['trenutnaStrana'])){
					$trenutnaStrana=$_POST['trenutnaStrana'];
				}
				
				$offset=($trenutnaStrana-1)*$redovaPoStrani; 
				
				
				 
				$odaberiSlike="SELECT * FROM slike  where id=".$id." LIMIT $offset, $redovaPoStrani";
				$rezultat2=mysqli_query($konekcija,$odaberiSlike);
		
		
		
			include("konekcija.inc");
					
			$izlistajSlike="SELECT * FROM galerija";
			$rezultat=mysqli_query($konekcija,$izlistajSlike);
			while($r=mysqli_fetch_array($rezultat)){
				$slike[] = $r;
			}
			
			
		?>
		
		<div id="pagination"> 
				<?php 

$page=0;
if(isset($_POST["page"]))
{
 $page=$_POST["page"];
 $page=($page*3)-3;
}
$res = mysqli_query($konekcija,"select * from galerija limit $page,4");

echo "<form action='galerija.php' method='POST'>";
while($row=mysqli_fetch_array($res))
{

		
		
		
		 echo " 
		<div class='box'>
			<div class='novooo' id='thumbnails'>
								<a href='".$row['putanjaSlike']."' > <img src='".$row['putanjaSlike']." '/> </a>
							</div>";
							echo "</div>";
}
"</form>";
$res1 = mysqli_query($konekcija,"select * from galerija");
$count=mysqli_num_rows($res1);//use for count how many images in database
$a=$count/3;
$a=ceil($a);//ceil function is used to round up figure
echo "<br><br>";
?>
<form method="post">
<?php
for($b=1;$b<=$a;$b++)
{
 ?>

    <input type="submit" value="<?php echo $b;?>" name="page" class="pagination">
	
 
    <?php
}?> 
			</div>	
			</div>
			
<div class="clear"></div>
	
	<?php		
			include("footer.php");
		?>
	
	</body>
</html>