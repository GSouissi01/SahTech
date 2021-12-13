<?php
	include __DIR__.'/Controller/reponseC.php';
	include __DIR__.'/Controller/reclamC.php';
	require_once( __DIR__.'/Model/reponse.php');
	$reponseC=new reponseC();
	$id=$_GET["id"];
	$text = $_POST['reponse'];
	$reponse = new reponse($text,$id);
	$reclamC=new reclamC();
	$reponseC->ajouterReponse($reponse);
	$reclamC->change_etat_to_retait($id);
	header("Location:view/admin/repondre.php?id=$id");
?>