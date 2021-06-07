<?php
include('class/classIles.php');
include('class/classVilles.php');

//$iles -> access class iles()
$iles = new iles();
//$iles -> access class villes()
$villes = new villes();


$resIles = $iles->getIles();
$resIleVille = $iles->getIlesVilles();
$resVilles = $villes->getVilles();


if (isset($_POST['btnIle'])) {

    // if btnIle == supprimer
    if ($_POST['btnIle'] == "Supprimer") {
		//etat change
        $etatIle = "fermer";

        // get idIle
        $id = $_POST['idIle'];

        // execute sql requete
        $iles->deleteIle($id);
    }
	
	// if btnIle == Modifier
    if ($_POST['btnIle'] == "Modifier") {
        
		// get idIle
        $idIle = $_POST['idIle'];
		
		//etat change
		$etatIle = "ouvrir";
    }
	
	// if btnIle == Confirmer
    if ($_POST['btnIle'] == "Confirmer") {
		//etat change
        $etatIle = "fermer";
		
		// get new_name
        $new_name = $_POST['new_name'];
		
		// get idIle
        $idIle = $_POST['idIle'];
	
		// execute sql requete
        $iles->updateIle($new_name, $idIle);
    }

	// if btnIle == Confirmer
    if ($_POST['btnIle'] == "Valider") {
		
		//etat change
        $etatIle = "fermer";
		
		// get nameIle
		$nameIle = $_POST['nameIle']; 
		
		// execute sql requete
		$iles->createIle($nameIle);       
    }
} else {
	//etat change
    $etatIle = "fermer";
}



if (isset($_POST['btnVille'])) {

    // if btnIle == supprimer
    if ($_POST['btnVille'] == "Supprimer") {
		//etat change
        $etatVille = "fermer";

        // get idVille
        $idVille = $_POST['idVille'];

        // execute sql requete
        $villes->deleteVille($idVille);
    }
	
	// if btnIle == Modifier
    if ($_POST['btnVille'] == "Modifier") {
		//etat change
        $etatVille = "ouvrir";
		//get idVille
        $idVille = $_POST['idVille'];
    }
	
	// if btnIle == Confirmer
    if ($_POST['btnVille'] == "Confirmer") {
		//etat change
        $etatVille = "fermer";
		//get new_name
        $new_name = $_POST['new_name'];
		//get idVille
        $idVille = $_POST['idVille'];
		
		// execute sql requete
        $villes->updateVille($new_name, $idVille);
    }

	// if btnIle == Valider
    if ($_POST['btnVille'] == "Valider") {
		//etat change
        $etatVille = "fermer";
		//get nameVille
		$nameVille = $_POST['nameVille'];
        
		// execute sql requete
		$villes->createVille($nameVille);
    }
} else {
	//etat change
    $etatVille = "fermer";
}


if (isset($_POST['btnVilleParIle'])) {
	// if btnIle == Confirmer
    if ($_POST['btnVilleParIle'] == "Ajouter") {
		
		
		// get IleVille
		$nameIle = $_POST['IleVille']; 
		// get villeParIle
		$nameVille = $_POST['villeParIle']; 
		echo $nameIle.'  ';
		echo $nameVille;
		
		// execute sql requete
		$iles->createVilleParIle($nameIle,$nameVille);       
    }
} else {
	//etat change
    $etatIle = "fermer";
}

?>

