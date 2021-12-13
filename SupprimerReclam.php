<?php
	include __DIR__.'/Controller/reclamC.php';
	$reclamC=new reclamC();
	$reclamC->supprimerReclamation($_GET["id"]);
	if($_GET['return']=='client'){
		header('Location:view/AfficherReclam.php');
	}else{
		header('Location:view/admin/index.php');
	}
?>