<?php
	class Equip{
		private $ref=null;
		private $nom=null;
		private $dsc=null;
		private $quantite=null;
		private $prix=null;
		private $img=null; 
		private $id_catalogue=null;
		// private $password=null;
		function __construct($ref, $nom, $dsc, $quantite, $prix, $img, $id_catalogue){
			$this->ref=$ref;
			$this->nom=$nom;
			$this->dsc=$dsc;
			$this->quantite=$quantite;
			$this->prix=$prix;
			$this->img=$img;
			$this->id_catalogue=$id_catalogue;
		}
		function getRef(){
			return $this->ref;
		}
		function getNom(){
			return $this->nom;
		}
		function getDesc(){
			return $this->dsc;
		}
		function getQt(){
			return $this->quantite;
		}
		function getPrix(){
			return $this->prix;
		
		}
		function getImage(){
			return $this->img;
		}
		function getCateg(){
			return $this->id_catalogue;
		}
		function setRef(){
			$this->ref=$ref;
		}
		function setNom(string $nom){
			$this->nom =$nom; 
        }
		function setDesc(string $dsc){
			$this->dsc=$dsc;
		}
		function setQt(int $quantite){
			$this->quantite=$quantite;
		}
		function setPrix(int $prix){
			$this->prix=$prix;
		}
		function setImage(string $img){
			$this->img = $img;
		}
		function setCateg(int $id_catalogue){
			$this->id_catalogue =$id_catalogue; 
        }
		
	}
	
	

?>