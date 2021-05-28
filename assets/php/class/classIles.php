<?php
include __DIR__."./../connexion.php";

class iles {
    
/** ============================ **/
	// RECUPERER TOUT LES ILES et VILLE par ILES\\
/** ============================ **/
    //fonction getIles() qui récupere tout les iles
    public function getIles(){
        global $conn; 

        $req = "SELECT * from iles" ; //$sql : contient la requete sql 
        $resIles = $conn->query($req); //$result : execute la requete $sql

        return $resIles;

    }
	
    //fonction getIlesVilles() qui récupére les villes de l'ile 
	public function getIlesVilles(){
        global $conn; 
        //$sql : contient la requete sql 
        $req = "SELECT  I.name, V.name
				FROM `ile_ville` IV, `villes` V, `iles` I
				WHERE I.id=IV.fk_ile AND V.id=IV.fk_ville" ; 
        $resIleVille = $conn->query($req); //$result : execute la requete $sql
        return $resIleVille;
    }

/** ============================ **/
	// FIN \\
/** ============================ **/	
	
	
	

/** ============================ **/
	// CREER / INSERTION  \\
/** ============================ **/

    //fonction createIle($name) qui créer une île
    public function createIle($name){

        global $conn;
        $sql = "INSERT INTO `iles`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	
/** ============================ **/
	// FIN CREER / INSERTION  \\
/** ============================ **/
	
	
	
	
/** ============================ **/
	// SUPPRESSION \\
/** ============================ **/

    //fonction deleteIle($idIle) qui supprime l'ile (id=$idIle)
    public function  deleteIle($idIle){
        
        global $conn; 
        //requete SQL qui supprime l'ile par rapport à l'id
        $req_delete = "DELETE FROM iles WHERE id=".$idIle;

        // execute la requête précédente
        $conn->query($req_delete);
    }
 
/** ============================ **/
	// FIN SUPPRESSION \\
/** ============================ **/


/** ============================ **/
	// MISE A JOUR  \\
/** ============================ **/
    
    //fonction updateIle($new_name,$idIle) qui met a jour l'ile
    public function updateIle($new_name,$idIle){
        global $conn;

        $req_update = "UPDATE `iles` SET `name`= '$new_name'  WHERE id =".$idIle;
        $conn->query($req_update);

    }
	
/** ============================ **/
// FIN MISE A JOUR  \\
/** ============================ **/
	


/** ============================ **/
	// RECUPERER LES VILLES D'UNE ILE  \\
/** ============================ **/
    
    //fonction getCityByIsland($getVilles) qui recupere les villes d'une ile  ---> AJAX
	public function getCityByIsland($getVilles){
        global $conn;

        $req_select = "SELECT v.name FROM `ile_ville` as iv join iles as i on iv.fk_ile = i.id join villes as v on iv.fk_ville = v.id WHERE i.name = '".$getVilles."'";
        $res_select = $conn->query($req_select);
        // var_dump($res_select);
        foreach ($res_select as $value) {
			
            $island['data'][] = $value['name'];
        }
        return json_encode($island);
    }
	
/** ============================ **/
	// FIN RECUPERER LES VILLES D'UNE ILE  \\
/** ============================ **/


/** ============================ **/
	// CREER / INSERTION  \\
/** ============================ **/
    //fonction createVilleParIle($nameVille, $nameIle) qui assigne une ville a une ile
    public function createVilleParIle($nameVille, $nameIle){

        global $conn;
        $sql = "INSERT INTO `ile_ville`(`fk_ile`,`fk_ville`) VALUES ('$nameVille','$nameIle')";
        $conn->query($sql);

    }
	
/** ============================ **/
	// FIN CREER / INSERTION  \\
/** ============================ **/

}	
 


