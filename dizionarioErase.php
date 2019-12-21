<?php
$erase= $_GET['Erase'];
$submitErase= $_GET['erase'];
$erase=filter_var($erase,FILTER_SANITIZE_STRING);
$submitErase=filter_var($submitErase,FILTER_SANITIZE_STRING);
$erase=strtolower($erase);
SEARCH($erase);

function SEARCH($erase){
	$inp = file_get_contents('dizio.json');
	$tempArray = json_decode($inp,true);
	$i=0;
	if(isset($tempArray[$erase])==true){
		DELETEA($erase);;
	}else{echo "non esiste";}
	}
	
function DELETEA($erase){
	$inp = file_get_contents('dizio.json');
	$tempArray = json_decode($inp,true);
	if(isset($tempArray[$erase])==true){
		unset($tempArray[$erase]);
		$x = json_encode($tempArray,true);
		file_put_contents('dizio.json', $x);
		echo "fatto!!!";
	}
	}
?>