<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../Model/reclam.php';

class reclamC
{   
   
    function ajouterReclamation( $reclam)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare("insert into reclamation (nom_prenom,texte,type,num_commande,etat)
            VALUES(:nom_prenom,:text,:type,:num_commande,:etat)" );
            $nom_prenom = $reclam->getNom_prenom();
            $type = $reclam->getType();
            $num_commande = $reclam->getNum_commande();
            $etat = $reclam->getEtat();
            $text = $reclam->getText();
            $query->execute([
				'nom_prenom'=>$nom_prenom,
				'text'=>$text,
				'type'=>$type,
				'num_commande'=>$num_commande,
				'etat'=>$etat
			]);
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }

	function afficherReclamation()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM reclamation');
            $query->execute();
            $result = $query->fetchALL();
            return $result ;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }

    function supprimerReclamation(int $id)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from reclamation where id = :id');
            $query->execute(['id' => $id]);
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }   
    }
    function getreclamation(int $id)
    {
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('SELECT * FROM reclamation where id = :id');

        $query->execute(['id'=>$id]);
        $result = $query->fetch();
        return $result ;
        }
        catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
    function modifierreclamation(reclam $reclam ,int $id)
    {
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('UPDATE reclamation SET
        nom_prenom = :nom_prenom,
        type = :type,
        texte= :text,
		etat=:etat
        WHERE id = :id  ');

        $query->execute([
        'nom_prenom' => $reclam->getNom_prenom(),
        'type' => $reclam->getType(),
        'text' => $reclam->getText(),
		'etat' => $reclam->getEtat(),
        'id' => $id]);
         }
         catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
       
    }

    function tri ($champ){
        $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM `reclamation` ORDER BY `'.$champ.'` ASC;');
            $query->execute([
                'champ'=>$champ
            ]);

            $result = $query->fetchALL();
            return $result ;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }


    }
    function recherche ($nom){
        $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('SELECT * FROM reclamation WHERE nom_prenom = :np ');
            $query->execute([
                'np'=>$nom
            ]);
            $result = $query->fetchALL();
            return $result ;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }


    }
    function nbr_enatte(){
        $pdo=config::getConnexion();
            try 
            {
                $query = $pdo->prepare("SELECT count(*) FROM reclamation WHERE etat = 'en attente' ");
                $query->execute([
                ]);
                $result = $query->fetch();
                return $result ;
            }
            catch(Exception $e)
            {
                die('erreur :'.$e->getMessage());
            }
            
    }
    function change_etat_to_retait($id){
        $pdo = config::getConnexion();
        try {

        $query = $pdo->prepare('UPDATE reclamation SET
        etat = :etat
        
        WHERE id = :id  ');

        $query->execute([
            'etat'=>'traité',
        'id' => $id]);
         }
         catch(Exception $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
}
?>