<?php
$word= $_GET['word'];
$submitcerca=$_GET['cerca'];
$word=filter_var($word,FILTER_SANITIZE_STRING);
$submitcerca=filter_var($submitcerca,FILTER_SANITIZE_STRING);
echo SEARCH($word);


function ADD($word){
$sinonimo="Abitazione";
$contrario="affitto";
$post_data = array('Parola' => $word,
	'sinonimo' => $sinonimo,
	'contrario' => $contrario);
$post_data = json_encode($post_data,JSON_OBJECT_AS_ARRAY);
$inp = file_get_contents('dizio.json');
$tempArray = array(json_decode($inp,JSON_OBJECT_AS_ARRAY));
array_push($tempArray, $post_data);
$jsonData = json_encode($tempArray,JSON_OBJECT_AS_ARRAY);
file_put_contents('dizio.json', $jsonData);
}

function SEARCH($word){
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));
	for($tempArray as $Parola => $Parola_value){
		if($word == $Parola);{
			return 'esiste!!';}
		else {return 'non esiste';}
	}
}
	
function DELETE($word){
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
	}
	
}
?>
