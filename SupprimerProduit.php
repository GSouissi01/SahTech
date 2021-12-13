<?php
	include '../Controller/EquipC.php';
	$equipc=new EquipC();
	$equipc->supprimerequip($_GET['ref']);
	//$equipC=$equipC->afficherequip(); 
	header('ReadProduct.php');
?>