<?php

	include 'class/classIles.php';

	$iles_obj = new iles();

	//get ile
	$getIles = $_POST['getIles'];

	//get villes by ile
	$res_getcity = $iles_obj->getCityByIsland($getIles);


	echo $res_getcity;

