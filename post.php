<?php
error_reporting(0);
$type = $_POST['type'];
$niz = $_POST['niz'];

if(isset($type) && isset($niz)){
	
	function average($niz) 
	{
		$count = count($niz);
		foreach ($niz as $value) 
		{
			$total += $value;
		}
		$avg = ($total/$count);
		return $avg;
	}

	if($type == "json"){
		header("Content-type: application/json");
		$test_array = array (
			'rezultat' => (average($niz)),
		);
		echo json_encode($test_array);
	}else {
		header("Content-type: text/xml");
		$test_array = array (
			(average($niz)) => 'rezultat',
		);
		$xml = new SimpleXMLElement('<root/>');
		array_walk_recursive($test_array, array ($xml, 'addChild'));
		print $xml->asXML();
	}
}else{
	echo "Error!\nPolja za izracunavanje srednje vrednosti niza su prazne, ili/i tip(json/xml)\nZa unos elemenata u niz, u postmanu, unesite ih po sledecem formatu:\n key \t\t value \n niz[0] \t 1 \n niz[1] \t 2 \n niz[2] \t 3";
}
?>