<?php
header('Content-Type: text/html; charset=UTF-8');
//--
include_once("fonctions.php");
//--
$dossier = "uploads/sda-customer.txt";
$contenuSda = lireFichier($dossier);

// Récupération des données
$tabResult = array();
foreach($contenuSda as $key => $value)
{
	$ligneLue = $value;
	$ligneLue = str_ireplace("+", " ", $ligneLue);
	$ligneLue = str_ireplace("<", " ", $ligneLue);
	$tableLigne = explode(" ", trim($ligneLue));

	foreach($tableLigne as $k => $v){
		$dataValue = trim($v);
		if(!empty($dataValue) && is_numeric($dataValue)){
			$tabResult[] = $dataValue;
		}
	}
}

// Tri croissant
sort($tabResult);
?>