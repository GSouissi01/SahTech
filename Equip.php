<?php
	class Equip{
		private $ref=null;
		private $nom=null;
		private $description=null;
		private $quantite=null;
		private $prix=null;
		private $password=null;
		function __construct($ref, $nomduproduit, $description, $quantite, $prix){
			$this->ref=$ref;
			$this->nomduproduit=$nomduproduit;
			$this->description=$description;
			$this->quantite=$quantite;
			$this->prix=$prix;
		}
		function getRef(){
			return $this->ref;
		}
		function getNom(){
			return $this->nomduproduit;
		}
		function getDesc(){
			return $this->description;
		}
		function getQt(){
			return $this->quantite;
		}
		function getPrix(){
			return $this->prix;
		}
		function setRef(string $ref){
			$this->ref=$ref;
		}
		function setNom(string $nomduproduit){
			$this->nomduproduit =$nomduproduit; 
        }
		function setDesc(string $description){
			$this->description=$description;
		}
		function setQt(string $quantite){
			$this->quantité=$quantite;
		}
		function setPrix(string $prix){
			$this->prix=$prix;
		}
		
	}


?>