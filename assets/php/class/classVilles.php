<?php
include __DIR__."./../connexion.php";

class villes {


	/**
     * function get all villes
     *
     * @return $resVilles
     */
    public function getVilles(){
        global $conn; 
		//$req : sql requete get all villes
        $req = "SELECT * from villes" ; 
		//$resVilles : execute sql requete
        $resVilles = $conn->query($req); 

        return $resVilles;

    }
	
	
	/**
     * function get villes by ile
     *
     * @return $resVillesParIle
     */
    public function getVillesParIle($id){
        global $conn; 
		//$req : sql requete get villes by ile
        $req = "SELECT * from villes WHERE fk_ile=".$id; 
		//$resVillesParIle : execute sql requete
        $resVillesParIle = $conn->query($req); 

        return $resVillesParIle;
	}


	/**
     * function create new ville
     *
     * 
     */
    public function createVille($name){

        global $conn;
		//$sql : sql 
        $sql = "INSERT INTO `villes`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	

   
	/**
     * function delete ville by id
     *
     * 
     */
    public function  deleteVille($id){
        
        global $conn; 
        //req_delete : sql requete delete ville by ile
        $req_delete = "DELETE FROM villes WHERE id=".$id;

        // execute sql requete
        $conn->query($req_delete);

    }
 
    
	/**
     * function update ville by id
     *
     * 
     */
    public function updateVille($new_name,$id){
        global $conn;
		//req_update : sql requete update ville by id
        $req_update = "UPDATE `villes` SET `name`= '$new_name' WHERE id =".$id;
        $conn->query($req_update);

    }
	
}	
 


