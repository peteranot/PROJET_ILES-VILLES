<?php
include __DIR__."./../connexion.php";

class iles {
    

	/**
     * function get all iles
     *
     * @return $resIles
     */
    public function getIles(){
        global $conn; 
		//$req : sql requete get all ile 
        $req = "SELECT * from iles" ; 
		//$resIles : execute sql requete
        $resIles = $conn->query($req); 

        return $resIles;

    }
	
    
	/**
     * function get ville by ile
     *
     * @return $resIleVille
     */
	public function getIlesVilles(){
        global $conn; 
        //$req : sql requete get ville by ile
        $req = "SELECT  I.name, V.name
				FROM `ile_ville` IV, `villes` V, `iles` I
				WHERE I.id=IV.fk_ile AND V.id=IV.fk_ville" ; 
		//$resIleVille : execute sql requete
        $resIleVille = $conn->query($req); 
        return $resIleVille;
    }


    
	/**
     * function create new ile
     *
     * 
     */
    public function createIle($name){

        global $conn;
		//$sql : sql requete insert new ile
        $sql = "INSERT INTO `iles`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	

	/**
     * function delete ile by id
     *
     * 
     */
    public function  deleteIle($idIle){
        
        global $conn; 
        //$req_delete : sql requete delete ile by id
        $req_delete = "DELETE FROM iles WHERE id=".$idIle;

        // execute sql requete
        $conn->query($req_delete);
    }
 

    
	/**
     * function update ile by id
     *
     * 
     */
    public function updateIle($new_name,$idIle){
        global $conn;
		//$req_update : sql requete update ile by id
        $req_update = "UPDATE `iles` SET `name`= '$new_name'  WHERE id =".$idIle;
        $conn->query($req_update);

    }
	

    
	/**
     * function get ville by ile ---> AJAX
     *
     * @return json_encode($island)
     */
	public function getCityByIsland($getVilles){
        global $conn;
		//$req_select : sql requete get ville by ile
        $req_select = "SELECT v.name FROM `ile_ville` as iv join iles as i on iv.fk_ile = i.id join villes as v on iv.fk_ville = v.id WHERE i.name = '".$getVilles."'";
        $res_select = $conn->query($req_select);
        foreach ($res_select as $value) {
			
            $island['data'][] = $value['name'];
        }
		//return $island json format
        return json_encode($island);
    }
	

	/**
     * function create Ville by ile
     *
     * 
     */
	public function createVilleParIle($nameVille, $nameIle){

        global $conn;
		//$sql : sql requete insert ville by ile
        $sql = "INSERT INTO `ile_ville`(`fk_ile`,`fk_ville`) VALUES ('$nameVille','$nameIle')";
        $conn->query($sql);

    }


}	
 


