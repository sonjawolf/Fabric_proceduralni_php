<?php
	
	
	$konekcija = mysqli_connect('localhost','root','','faabric');
	
	$greske = array();
	if(!$konekcija){
		$greske[] = "Greska prilikom konekcije sa serverom baze podataka! ".mysqli_error();
	}
	
	
	$dirVelike="img/uploaded/";
	$dirMale="img/uploaded/small";
	
	
	mysqli_set_charset($konekcija,"utf8");
?>