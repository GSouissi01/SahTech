<?php
    include_once 'Model/reclam.php';
    include_once 'Controller/reclamC.php';

    $reclamC = new reclamC();
    if (
        isset($_POST["id"]) &&
		isset($_POST["name"]) &&		
        isset($_POST["slect"]) &&
		isset($_POST["contenu"]) 
    ) {
    if (
            !empty($_POST["id"]) && 
			!empty($_POST["name"]) &&
            !empty($_POST["slect"]) && 
			!empty($_POST["contenu"]) 
    ) {
            $reclam = new reclam($_POST["name"], $_POST["slect"], $_POST["id"], $_POST["contenu"]);
            $reclamC->ajouterReclamation($reclam);
            header('Location:view/ajouterReclam.php');
        }
       
    }

    
?>