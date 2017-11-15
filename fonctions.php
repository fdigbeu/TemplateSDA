<?php
// Lecture d'un fichier texte
function lireFichier($filename)
{
	if(file_exists($filename)){
		$ligne = array();
		$fp = fopen($filename,"r");
		while (!feof($fp))
		{
			$ligne[] = fgets($fp, 8192);
		}
		return $ligne;
	}
	else{
		exit("Aucun fichier trouvé.");
	}
}

// Filtrage des données
function filtrerContenu($string){
	if(substr(trim($string), 0, 1) == "<"){
		$text = trim(str_ireplace("<", " ", $string));
		$tab = explode(" ", $text);
		if(count($tab) >= 2){
			return $tab[0]." < ".$tab[count($tab)-1];
		}
		else{
			return $tab[0];
		}
	}
	else{
		$newTab = array();
		$text = trim(str_ireplace("+", " ", $string));
		$tab = explode(" ", $text);
		for($i=0; $i<count($tab); $i++){
			if(!empty($tab[$i]) && is_numeric($tab[$i])){
				$newTab[] = $tab[$i];
			}
		}
		return implode(" + ", $newTab);
	}
}
?>