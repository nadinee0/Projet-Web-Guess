<?php

	class categorie
	{
        private $id;
		private $subCat;
		private $nom;
        private $idReclamation;

		function __construct($id, $subCat,$nom,$idReclamation)
		{
			$this->subCat=$subCat;
			$this->nom=$nom;
            $this-> idReclamation=$idReclamation;
		}

		function getSubCat(){
			return $this->subCat;
		}
		function getNom(){
			return $this->nom;
		}
        function getIdReclamation(){
			return $this->idReclamation;
		}

		function setSubCat($subCat){
			$this->subCat=$subCat;
		}
		function setNom($nom){
			$this->nom=$nom;
		}
        function setIdReclamation($idReclamation){
			$this->idReclamation=$idReclamation;
		}
	}
	

  ?>
