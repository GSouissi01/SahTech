<?php
	include '../Controller/EquipC.php';
	$EquipC=new EquipC();
	//$EquipC=$EquipC->afficherequip(); 
	$EquipC->supprimerequip($_GET["Ref"]);
	header('Location:AfficherProduit.php');
?>