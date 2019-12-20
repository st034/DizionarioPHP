<?php
$erase= $_GET['Erase'];
$submitErase= $_GET['erase'];
$erase=filter_var($erase,FILTER_SANITIZE_STRING);
$submitErase=filter_var($submitErase,FILTER_SANITIZE_STRING);
echo SEARCH($erase);

function SEARCH($erase){
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));

	foreach($tempArray as $x => $x_value){
		if($erase == $x){return DELETEA($erase);}
		else {return 'la parola non esiste';}
	}
}
	
function DELETEA($erase){
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));
	$i=0;
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));

	foreach($tempArray as $x => $x_value){
		if($erase == $x){
			unset($tempArray[$x]);
			$jsonData = json_encode($tempArray,JSON_OBJECT_AS_ARRAY);
			file_put_contents('dizio.json', $jsonData);
			return 'fatto!!';}
		else {return 'ho un problema';}
}}
?>