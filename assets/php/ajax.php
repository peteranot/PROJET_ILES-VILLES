<?php

include 'class/classIles.php';

$iles_obj = new iles();


$getIles = $_POST['getIles'];


$res_getcity = $iles_obj->getCityByIsland($getIles);


echo $res_getcity;

