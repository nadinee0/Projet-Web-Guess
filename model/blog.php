<?php
	class blog{
		private $id=null;
		private $titre=null;
		private $contenu=null;
		private $date=null;
		private $categorie=null;
		private $jaime;
		
		//private $password=null;
		function __construct($id, $titre, $contenu, $date, $categorie, $jaime){
			$this->id=$id;
			$this->titre=$titre;
			$this->contenu=$contenu;
			$this->date=$date;
			$this->categorie=$categorie;
			$this->jaime=$jaime;
		}
		function getid(){
			return $this->id;
		}
        function gettitre(){
			return $this->titre;
		}
        function getcontenu(){
			return $this->contenu;
		}
        function getdate(){
			return $this->date;
		}
        function getcategorie(){
			return $this->categorie;
		}
        function getjaime(){
			return $this->jaime;
		}
		
	}


?>