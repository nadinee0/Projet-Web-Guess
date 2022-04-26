<?php
	class reclamation
	{  
		public $id;
		public $nom;
		public $ref;
		public $email;
		
		
		function __construct($id,$nom,$ref,$email)
		{
			$this->id=$id;
			$this->nom=$nom;
			$this->ref=$ref;
			$this->email=$email;	
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
		
		
	}

  ?>
