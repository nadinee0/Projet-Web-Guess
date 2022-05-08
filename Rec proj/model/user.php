<?php
	class user
	{  
		public $id;
		public $nom;
		public $prenom;
		public $telephone;
		public $idReclamation;
		

		function __construct($id,$nom,$prenom,$telephone, $idReclamation)
		{
			$this->id=$id;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->telephone=$telephone;	
			$this->idReclamation=$idReclamation;	
		
		}

		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getTelephone(){
			return $this->telephone;
		}
	
		function getIdReclamation(){
			return $this->idReclamation;
		}
	
	

		function setId($id){
			$this->id=$id;
		}
		function setNom($nom){
			$this->nom=$nom;
		}
		function setPrenom($prenom){
			$this->prenom=$prenom;
		}
		function setTelephone($telephone){
			$this->telephone=$telephone;
		}
		function setIdReclamation($idReclamation){
			$this->idReclamation=$idReclamation;
		}
	
		
	}

  ?>
