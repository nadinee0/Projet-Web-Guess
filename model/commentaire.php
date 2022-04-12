<?php
	class commentaire{
		private $id=null;
        private $id_blog=null;
		private $commentaire=null;
		private $nom=null;
		private $date=null;
		private $email=null;
		
		//private $password=null;
		function __construct($id, $id_blog, $commentaire,$date, $nom, $email){
			$this->id=$id;
			$this->id_blog=$id_blog;
			$this->commentaire=$commentaire;
			$this->nom=$nom;
			$this->date=$date;
			$this->email=$email;
		}
		function getid(){
			return $this->id;
		}
        function getid_blog(){
			return $this->id_blog;
		}
        function getcommentaire(){
			return $this->commentaire;
		}
        function getnom(){
			return $this->nom;
		}
        function getemail(){
			return $this->email;
		}
		function getdate(){
			return $this->date;
		}
        
		
	}


?>