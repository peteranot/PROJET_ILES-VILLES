<?php
include __DIR__."./../connexion.php";

class iles {
    
/** ============================ **\
	// RECUPERER TOUT LES LANGUES \\
/** ============================ **/

    /**
     * Description of function 
     *
     * @return $res_listLivres
     */
    public function getIles(){
        global $conn; 

        $req = "SELECT * from iles" ; //$sql : contient la requete sql 
        $resIles = $conn->query($req); //$result : execute la requete $sql

        return $resIles;

    }
	
	public function getIlesVilles(){
        global $conn; 

        $req = "SELECT  I.name, V.name
				FROM `ile_ville` IV, `villes` V, `iles` I
				WHERE I.id=IV.fk_ile AND V.id=IV.fk_ville" ; //$sql : contient la requete sql 
        $resIleVille = $conn->query($req); //$result : execute la requete $sql

        return $resIleVille;

    }

/** ============================ **\
	// FIN RECUPERER TOUT LES LANGUES \\
/** ============================ **/	
	
	
	

/** ============================ **\
	// CREER / INSERTION  \\
/** ============================ **/
    /**
     * create hello into "langue"
     *
     * @param string $name
     * @param string $translate
     *
     */
    public function createIle($name){

        global $conn;
        $sql = "INSERT INTO `iles`(`name`) VALUES ('$name')";
        $conn->query($sql);

    }
	
/** ============================ **\
	// FIN CREER / INSERTION  \\
/** ============================ **/
	
	
	
	
/** ============================ **\
	// SUPPRESSION \\
/** ============================ **/

    /**
     * Delete lang selected from "langue"
     *
     * @param int $id 
     *
     */
    public function  deleteIle($idIle){
        
        global $conn; 
        //sql to delete a record
        $req_delete = "DELETE FROM iles WHERE id=".$idIle;

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
     * Update DbShoop "livres"
     *
     * @param string $new_name 
     * @param string $new_translate 
     * @param int $id_langue
     *
     */
    public function updateIle($new_name,$idIle){
        global $conn;

        $req_update = "UPDATE `iles` SET `name`= '$new_name'  WHERE id =".$idIle;
        $conn->query($req_update);

    }
	
	/** ============================ **\
	// FIN MISE A JOUR  \\
	/** ============================ **/
	


/** ============================ **\
	// RECUPERER LES VILLES D'UNE ILE  \\
/** ============================ **/
    
    /**
     * Update DbShoop "livres"
     *
     * @param string $new_name 
     * @param string $new_translate 
     * @param int $id_langue
     *
     */	
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
	
/** ============================ **\
	// FIN RECUPERER LES VILLES D'UNE ILE  \\
/** ============================ **/


/** ============================ **\
	// CREER / INSERTION  \\
/** ============================ **/
    /**
     * create hello into "langue"
     *
     * @param string $name
     * @param string $translate
     *
     */
    public function createVilleParIle($nameVille, $nameIle){

        global $conn;
        $sql = "INSERT INTO `ile_ville`(`fk_ile`,`fk_ville`) VALUES ('$nameVille','$nameIle')";
        $conn->query($sql);

    }
	
/** ============================ **\
	// FIN CREER / INSERTION  \\
/** ============================ **/

}	
 


