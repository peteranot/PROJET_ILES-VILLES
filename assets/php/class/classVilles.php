<?php
include __DIR__."./../connexion.php";

class villes {
    
/** ============================ **/
	// RECUPERER TOUT LES Villes \\
/** ============================ **/

    //fonction getVille() qui recupére tout les villes
    public function getVilles(){
        global $conn; 

        $req = "SELECT * from villes" ; //$sql : contient la requete sql 
        $resVilles = $conn->query($req); //$result : execute la requete $sql

        return $resVilles;

    }

/** ============================ **/
	// FIN RECUPERER TOUT LES Villes \\
/** ============================ **/	
	
    //fonction getVillesParIle($id) recupere la ville de l'ile
    public function getVillesParIle($id){
        global $conn; 

        $req = "SELECT * from villes WHERE fk_ile=".$id; //$sql : contient la requete sql 
        $resVillesParIle = $conn->query($req); //$result : execute la requete $sql

        return $resVillesParIle;
	}


/** ============================ **/
	// CREER / INSERTION  \\
/** ============================ **/
    //fonction createVille($name) permet de créer une ville
    public function createVille($name){

        global $conn;
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
        //sql to delete a record
        $req_delete = "DELETE FROM villes WHERE id=".$id;

        // execute la requête précédente
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

        $req_update = "UPDATE `villes` SET `name`= '$new_name' WHERE id =".$id;
        $conn->query($req_update);

    }
	
/** ============================ **/
// FIN MISE A JOUR  \\
/** ============================ **/
	
}	
 


