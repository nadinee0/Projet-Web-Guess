<?php
	class reclamation
	{  
		public $id;
		public $nom;
		public $ref;
		public $email;
		public $type;
		public $description;
		public $status;
		public $idUser;

		function __construct($id,$nom,$ref,$email, $type, $description,$status, $idUser)
		{
			$this->id=$id;
			$this->nom=$nom;
			$this->ref=$ref;
			$this->email=$email;	
			$this->type=$type;	
			$this->description=$description;
			$this->status=$status;	
			$this->idUser=$idUser;	
		}

		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getRef(){
			return $this->ref;
		}
		function getEmail(){
			return $this->email;
		}
	
		function getType(){
			return $this->type;
		}
		function getdescription(){
			return $this->description;
		}
	
	
		function getStatus(){
			return $this->status;
		}
		function getIdUser(){
			return $this->idUser;
		}


		function setId($id){
			$this->id=$id;
		}
		function setNom($nom){
			$this->nom=$nom;
		}
		function setRef($ref){
			$this->ref=$ref;
		}
		function setEmail($email){
			$this->email=$email;
		}
		function setType($type){
			$this->type=$type;
		}
		function setdescription($description){
			$this->description=$description;
		}
		function setStatus($status){
			$this->status=$status;
		}
		function setIdUser($idUser){
			$this->idUser=$idUser;
		}
		
		
	}

  ?>
