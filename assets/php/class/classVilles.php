<?php
include __DIR__."./../connexion.php";

class villes {
    
/** ============================ **/
	// RECUPERER TOUT LES Villes \\
/** ============================ **/

    //fonction getVille() qui recupére tout les villes
    public function getVilles(){
        global $conn; 
		//$req : contient la requete sql 
        $req = "SELECT * from villes" ; 
		//$resVilles : execute la requete $sql
        $resVilles = $conn->query($req); 

        return $resVilles;

    }

/** ============================ **/
	// FIN RECUPERER TOUT LES Villes \\
/** ============================ **/	
	
    //fonction getVillesParIle($id) recupere la ville de l'ile
    public function getVillesParIle($id){
        global $conn; 
		//$req : contient la requete sql 
        $req = "SELECT * from villes WHERE fk_ile=".$id; 
		//$resVillesParIle : execute la requete $sql
        $resVillesParIle = $conn->query($req); 

        return $resVillesParIle;
	}


/** ============================ **/
	// CREER / INSERTION  \\
/** ============================ **/
    //fonction createVille($name) permet de créer une ville
    public function createVille($name){

        global $conn;
		//$sql : contient la requete sql 
        $sql = "INSERT INTO `villes`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	
/** ============================ **/
	// FIN CREER / INSERTION  \\
/** ============================ **/
	
	
	
	
/** ============================ **/
	// SUPPRESSION \\
/** ============================ **/

    //fonction deleteVille($id) qui supprime la ville concerné
    public function  deleteVille($id){
        
        global $conn; 
        //req_delete : contient la requete sql 
        $req_delete = "DELETE FROM villes WHERE id=".$id;

        // execute la requête sql
        $conn->query($req_delete);

    }
 
/** ============================ **/
	// FIN SUPPRESSION \\
/** ============================ **/


/** ============================ **/
	// MISE A JOUR  \\
/** ============================ **/
    
    //fonction updateVille($new_name,$id) qui met à jour la ville concerné
    public function updateVille($new_name,$id){
        global $conn;
		//req_update : contient la requete sql 
        $req_update = "UPDATE `villes` SET `name`= '$new_name' WHERE id =".$id;
        $conn->query($req_update);

    }
	
/** ============================ **/
// FIN MISE A JOUR  \\
/** ============================ **/
	
}	
 


