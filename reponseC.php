<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../Model/reponse.php';
class reponseC {


    function ajouterReponse( $reponse)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare("insert into reponse (text, id_reclam)
            VALUES(:text, :id_reclam)" );
            $text = $reponse->getText();
            $id_reclam = $reponse->getId_reclam();
           
            $query->execute([
				'text'=>$text,
				'id_reclam'=>$id_reclam,
			]);
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }

	function afficherReponse()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM reponse');
            $query->execute();
            $result = $query->fetchALL();
            return $result ;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }

    function supprimerReponse(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from reponse where id = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }   
    }
    function getReponse(int $id)
    {
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('SELECT * FROM reponse where id = :id');

        $query->execute(['id'=>$id]);
        $result = $query->fetch();
        return $result ;
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
    function modifierReponse(reponse $reponse ,int $id)
    {
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('UPDATE reponse SET
        text = :text
        WHERE id = :id  ');

        $query->execute([
        'text' => $reponse->getText(),
        'id' => $id]);
         }
         catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
       
    }

    function jointure(int $id_reclam){
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('SELECT * FROM reponse where id_reclam = :id_reclam');

        $query->execute(['id_reclam'=>$id_reclam]);
        $result = $query->fetchAll();
        return $result ;
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }

}