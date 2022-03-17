<?php

	

	
	
	function lista_dana()
	{
		$ispis = "";
		
		for($i = 1; $i <= 31; $i++)
		{
			$ispis .= "<option value='$i'>$i</option>";
		}
		return $ispis;
	}
	
	function lista_meseci()
	{
		$ispis = "";
		
		$meseci = array(
					1 => 'Januar',
					2 => 'Februar',
					3 => 'Mart',
					4 => 'April',
					5 => 'Maj',
					6 => 'Jun',
					7 => 'Jul',
					8 => 'Avgust',
					9 => 'Septembar',
					10 => 'Oktobar',
					11 => 'Novembar',
					12 => 'Decembar'
		);
		
		foreach($meseci as $i => $v)
		{
			$ispis .= "<option value='$i'>$v</option>";
		}
		return $ispis;
	}
	
	
	
	
	function lista_godina()
	{
		$ispis = "";
		
		for($i = 1932; $i <= 2016; $i++)
		{
			$ispis .= "<option value='$i'>$i</option>";
		}
		return $ispis;
	}
	
	
	
	
	
	
	
?>