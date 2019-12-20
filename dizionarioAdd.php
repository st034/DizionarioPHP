<?php
$addWord= $_GET['addword'];
$sinonimo= $_GET['sinonimi'];
$contrario= $_GET['contrario'];
$submitAdd =$_GET['add'];
$addWord=filter_var($addWord,FILTER_SANITIZE_STRING);
$sinonimo=filter_var($sinonimo,FILTER_SANITIZE_STRING);
$contrario=filter_var($contrario,FILTER_SANITIZE_STRING);
$submitAdd=filter_var($submitAdd,FILTER_SANITIZE_STRING);

echo SEARCH($addWord,$sinonimo,$contrario);

function SEARCH($addWord, $sinonimo, $contrario){
	$inp = file_get_contents('dizio.json');
	$tempArray = array(json_decode($inp,true));
	foreach($tempArray as $x => $x_value){
		if($addWord == $x_value){return 'la parola esiste già';}
		else {return ADD($addWord, $sinonimo, $contrario);}
	}
}

function ADD($addWord, $sinonimo, $contrario){
$post_data = array('Parola' => $addWord,
	'sinonimo' => $sinonimo,
	'contrario' => $contrario);
$post_data = json_encode($post_data);
$inp = file_get_contents('dizio.json');
$tempArray = array(json_decode($inp,true));
$tempArray.push($post_data);
$jsonData = json_encode($tempArray);
file_put_contents('dizio.json', $jsonData);
return 'aggiunta!!';
}

?>