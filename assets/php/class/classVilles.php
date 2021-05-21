<?php
include __DIR__."./../connexion.php";

class villes {
    
/** ============================ **\
	// RECUPERER TOUT LES Villes \\
/** ============================ **/

    /**
     * Description of function 
     *
     * @return $resVilles
     */
    public function getVilles(){
        global $conn; 

        $req = "SELECT * from villes" ; //$sql : contient la requete sql 
        $resVilles = $conn->query($req); //$result : execute la requete $sql

        return $resVilles;

    }

/** ============================ **\
	// FIN RECUPERER TOUT LES Villes \\
/** ============================ **/	
	
public function getVillesParIle($id){
        global $conn; 

        $req = "SELECT * from villes WHERE fk_ile=".$id; //$sql : contient la requete sql 
        $resVillesParIle = $conn->query($req); //$result : execute la requete $sql

        return $resVillesParIle;
	}


/** ============================ **\
	// CREER / INSERTION  \\
/** ============================ **/
    /**
     * requete INSERT INTO "villes"
     *
     * @param string $name
     *
     */
    public function createVille($name){

        global $conn;
        $sql = "INSERT INTO `villes`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	
/** ============================ **\
	// FIN CREER / INSERTION  \\
/** ============================ **/
	
	
	
	
/** ============================ **\
	// SUPPRESSION \\
/** ============================ **/

    /**
     * requete DELETE from "villes"
     *
     * @param int $id 
     *
     */
    public function  deleteVille($id){
        
        global $conn; 
        //sql to delete a record
        $req_delete = "DELETE FROM villes WHERE id=".$id;

        // execute la requête précédente
        $conn->query($req_delete);

    }
 
/** ============================ **\
	// FIN SUPPRESSION \\
/** ============================ **/


/** ============================ **\
	// MISE A JOUR  \\
/** ============================ **/
    
    /**
     * requete UPDATE from "villes"
     *
     * @param string $new_name 
     *
     */
    public function updateVille($new_name,$id){
        global $conn;

        $req_update = "UPDATE `villes` SET `name`= '$new_name' WHERE id =".$id;
        $conn->query($req_update);

    }
	
	/** ============================ **\
	// FIN MISE A JOUR  \\
	/** ============================ **/
	
}	
 


