
	
<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "rsma_iles";
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "BDD connecté";
	}
	
	//echo "Base de données connecté: ".$dbname;

