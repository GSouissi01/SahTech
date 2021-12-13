<?php
	class reclam{
		private $identifiant=null;
		private $nom_prenom=null;
		private $type=null;
		private $num_commande=null;
		private $date=null;
		private $text=null;
		private $etat="en attente";
		function __construct($nom_prenom, $type, $num_commande, $text){
			$this->nom_prenom=$nom_prenom;
			$this->type=$type;
			$this->num_commande=$num_commande;
			$this->text=$text;
		}
		function getIdentifiant(){
			return $this->identifiant;
		}
		function getNom_prenom(){
			return $this->nom_prenom;
		}
		function getType(){
			return $this->type;
		}
		function getNum_commande(){
			return $this->num_commande;
		}
		function getDate(){
			return $this->date;
		}
		function getText(){
			return $this->text;
		}
		function getEtat(){
			return $this->etat;
		}
		function setIdentifiant(int $identifiant){
			$this->identifiant=$identifiant;
		}
		function setNom_prenom(string $nom_prenom){
			$this->nom_prenom =$nom_prenom; 
        }
		function setType(string $type){
			$this->type=$type;
		}
		function setNum_commande(string $num_commande){
			$this->num_commande=$num_commande;
		}
		function setDate($date){
			$this->date=$date;
		}
		function setText(string $text){
			$this->text=$text;
		}
		function setEtat(string $etat){
			$this->etat=$etat;
		}
		
	}


?>