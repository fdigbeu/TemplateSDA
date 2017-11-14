<?php
include_once("rangement.php");

// Balayage
//$sdaFirst = $tabResult[0];
//$sdaEnd = $tabResult[count($tabResult)-1];

//$tabResult = array(1, 2, 3, 5, 7, 8, 9, 10, 14, 16, 18, 19, 20, 21, 23, 27, 36);

$tabSuccessif = array();
for ($i=0; $i < count($tabResult); $i++){
	// Si c'est le premier nombre (SDA Fisrt)
	if($i==0){
		// On vérifie si c'est le nombre suivant
		if(isset($tabResult[$i+1]) && ($tabResult[$i+1] == $tabResult[$i]+1)){
			$tabSuccessif[] = " < ".$tabResult[$i];
		}
		else{
			$tabSuccessif[] = " + ".$tabResult[$i];
		}
	}
	else{
		// Si c'est le nombre suivant
		if($tabResult[$i-1]+1 == $tabResult[$i]){
			$tabSuccessif[] = " < ".$tabResult[$i];
		}
		else{
			if(isset($tabResult[$i+1]) && ($tabResult[$i+1] == $tabResult[$i]+1)){
				$tabSuccessif[] = " < ".$tabResult[$i];
			}
			else{
				$tabSuccessif[] = " + ".$tabResult[$i];
			}
		}
	}
}

// Affiche
echo "<pre>"; 
//print_r($tabSuccessif); 
//print_r($sdaFirst); 
//echo "<br>";
//print_r($sdaEnd); 
echo "</pre>";

$chaineFusion = "";
$tabFusion = array();
$tabFusionResultat = array();

for ($i=0; $i < count($tabSuccessif); $i++){
	if($i == 0){
		$chaineFusion = $tabSuccessif[0];
	}
	else{
		// On vérifie si c'est le nombre suivant
		if(substr(trim($tabSuccessif[$i-1]), 0, 1) == substr(trim($tabSuccessif[$i]), 0, 1)){
			$chaineFusion .= $tabSuccessif[$i];
		}
		else{
			$chaineFusion .= " @ ".$tabSuccessif[$i];
		}
	}
}

//print_r($chaineFusion);

$tabFusion = explode("@", $chaineFusion);

//echo "<pre>"; print_r($tabFusion); echo "</pre>";

for ($i=0; $i < count($tabFusion); $i++){
	//$tabFusionResultat[] = filtrerContenu($tabFusion[$i]);
	echo filtrerContenu($tabFusion[$i])."<br />";
}

//echo "<pre>"; print_r($tabFusionResultat); echo "</pre>";

?>