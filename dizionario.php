<?php
$word= $_GET['word'];
$submitcerca=$_GET['cerca'];
$word=filter_var($word,FILTER_SANITIZE_STRING);
$submitcerca=filter_var($submitcerca,FILTER_SANITIZE_STRING);
$word=strtolower($word);
SEARCH($word);


function SEARCH($word){
	$inp = file_get_contents('dizio.json');
	$tempArray = json_decode($inp,true);
	$i=0;
	if(isset($tempArray[$word])==true){
		echo $word;
		print_r($tempArray[$word]);
	}else{echo "non esiste!!";}
	}
/*	
function DELETEA($word){
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));
	$i=0;
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));

	foreach($tempArray as $x => $x_value){
		if($word == $x){
			unset($tempArray[$x]);
			$jsonData = json_encode($tempArray,JSON_OBJECT_AS_ARRAY);
			file_put_contents('dizio.json', $jsonData);
			return true;}
		else {return false;}
	}*/
	
}
?>
