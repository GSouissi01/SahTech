<?php
	include __DIR__.'/Controller/reponseC.php';
	$reponseC=new reponseC();
	$id_rec=$_GET['id_rec'];
	$reponseC->supprimerReponse($_GET["id_rep"]);
	header("Location:view/admin/repondre.php?id=$id_rec");
?>