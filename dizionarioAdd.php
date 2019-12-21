<?php
$addWord= $_GET['addword'];
$sinonimo= $_GET['sinonimi'];
$contrario= $_GET['contrario'];
$submitAdd =$_GET['add'];
$addWord=filter_var($addWord,FILTER_SANITIZE_STRING);
$sinonimo=filter_var($sinonimo,FILTER_SANITIZE_STRING);
$contrario=filter_var($contrario,FILTER_SANITIZE_STRING);
$submitAdd=filter_var($submitAdd,FILTER_SANITIZE_STRING);

SEARCH($addWord,$sinonimo,$contrario);

function SEARCH($addWord,$sinonimo,$contrario){
	$inp = file_get_contents('dizio.json');
	$tempArray = json_decode($inp,true);
	$i=0;
	if(isset($tempArray[$addWord])==true){
		echo "esiste gia!!";
	}else{ADD($addWord,$sinonimo,$contrario);}
	}

function ADD($addWord, $sinonimo, $contrario){
	$inp = file_get_contents('dizio.json');
	$tempArray = json_decode($inp,true);
	//$addW=array("$addWord"=>$Parola=array("Contrari"=>"$contrario", "Sinonimo"=>"$sinonimo"));
	//print_r ($addW);
	$tempArray[$addWord]=$Parola=array("Contrari"=>"$contrario", "Sinonimo"=>"$sinonimo");;
	print_r($tempArray);
	$x = json_encode($tempArray,true);
	file_put_contents('dizio.json', $x);
	echo 'aggiunta!!!';
	

}

?>