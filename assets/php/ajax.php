<?php
	//inclure la classe classIles.php
	include 'class/classIles.php';

	$iles_obj = new iles();

	//recupére l'ile 
	$getIles = $_POST['getIles'];

	//récupere les villes de l'ile concerné
	$res_getcity = $iles_obj->getCityByIsland($getIles);


	echo $res_getcity;

