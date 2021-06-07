
	
<?php
	//server name
	$host = "localhost";
	//user admin
	$username = "root";
	//user password
	$password = "";
	//database name
	$dbname = "rsma_iles";
	// Create connexion
	$conn = new mysqli($host, $username, $password, $dbname);

	// verify connexion
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "BDD connecté";
		//echo "Base de données connecté: ".$dbname;
	}
	
	

