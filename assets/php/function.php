<?php
include('class/classIles.php');
include('class/classVilles.php');

//$iles -> accès au fonctions de la class iles()
$iles = new iles();
//$iles -> accès au fonctions de la class villes()
$villes = new villes();


// j'affiche ma liste
$resIles = $iles->getIles();
$resIleVille = $iles->getIlesVilles();
$resVilles = $villes->getVilles();


// =========================
// gestion des boutons des Formulaires des Iles
// =========================

if (isset($_POST['btnIle'])) {

    // si bouton btnIle == supprimer
    if ($_POST['btnIle'] == "Supprimer") {
        $etatIle = "fermer";

        // je récupère l'id de l'ile concerné
        $id = $_POST['idIle'];

        // j"execute la requete
        // dans ma fonction deleteIle
        $iles->deleteIle($id);
    }
	
	// si bouton btnIle == Modifier
    if ($_POST['btnIle'] == "Modifier") {
        
		// je récupère l'id de l'ile concerné
        $idIle = $_POST['idIle'];
		
		//je change l'etat
		$etatIle = "ouvrir";
    }
	
	// si bouton btnIle == Confirmer
    if ($_POST['btnIle'] == "Confirmer") {
		//je change l'etat
        $etatIle = "fermer";
		
		// je récupère le nom de l'ile concerné dans le input new_name
        $new_name = $_POST['new_name'];
		
		// je récupère l'id de l'ile concerné
        $idIle = $_POST['idIle'];
	
		// j"execute la requete
        // dans ma fonction updateIle
        $iles->updateIle($new_name, $idIle);
    }

	// si bouton btnIle == Confirmer
    if ($_POST['btnIle'] == "Valider") {
		
		//je change l'etat
        $etatIle = "fermer";
		
		// je récupère le nom de l'ile concerné dans le input nameIle
		$nameIle = $_POST['nameIle']; 
		
		// j"execute la requete
        // dans ma fonction createIle
		$iles->createIle($nameIle);       
    }
} else {
	//je change l'état 
    $etatIle = "fermer";
}


// =========================
// gestion des boutons des Formulaires des Villes
// =========================

if (isset($_POST['btnVille'])) {

    // si bouton btnIle == supprimer
    if ($_POST['btnVille'] == "Supprimer") {
        $etatVille = "fermer";

        // je récupère les langues supprimer
        $idVille = $_POST['idVille'];

        // j"execute ma requête supprimer
        // dans ma fonction deletelang
        $villes->deleteVille($idVille);
    }
	
	// si bouton btnIle == Modifier
    if ($_POST['btnVille'] == "Modifier") {
        $etatVille = "ouvrir";
        $idVille = $_POST['idVille'];
		echo "test";
    }
	
	// si bouton btnIle == Confirmer
    if ($_POST['btnVille'] == "Confirmer") {
        $etatVille = "fermer";
        $new_name = $_POST['new_name'];
        $idVille = $_POST['idVille'];

        $villes->updateVille($new_name, $idVille);
    }

	// si bouton btnIle == Valider
    if ($_POST['btnVille'] == "Valider") {

        $etatVille = "fermer";
		$nameVille = $_POST['nameVille'];
        
		$villes->createVille($nameVille);
    }
} else {

    $etatVille = "fermer";
}


// =========================
// gestion des boutons des Formulaires des Iles
// =========================

if (isset($_POST['btnVilleParIle'])) {
	// si bouton btnIle == Confirmer
    if ($_POST['btnVilleParIle'] == "Ajouter") {
		
		
		// je récupère le nom de l'ile concerné dans le input nameIle
		$nameIle = $_POST['IleVille']; 
		$nameVille = $_POST['villeParIle']; 
		echo $nameIle.'  ';
		echo $nameVille;
		// j"execute la requete
        // dans ma fonction createIle
		$iles->createVilleParIle($nameIle,$nameVille);       
    }
} else {
	//je change l'état 
    $etatIle = "fermer";
}

?>

