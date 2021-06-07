
	
<?php
	//nom du serveur
	$host = "localhost";
	//utilisateur admin
	$username = "root";
	//mot de passe
	$password = "";
	//nom de la base de données
	$dbname = "rsma_iles";
	// Creer la connexion
	$conn = new mysqli($host, $username, $password, $dbname);

	// Verifier la connexion 
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "BDD connecté";
		//echo "Base de données connecté: ".$dbname;
	}
	
	

