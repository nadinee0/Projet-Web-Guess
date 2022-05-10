<?php
    class promotion{
        private $id=null;
        private $id_prod=null;
        private $pourcentage=null;
        private $duree=null;
     
      
        
        //private $password=null;
        function __construct($id, $pourcentage, $duree, $id_prod){
            $this->id=$id;
            $this->pourcentage=$pourcentage;
            $this->duree=$duree;
            $this->id_prod=$id_prod;

          
          
        }
        function getId(){
            return $this->id;
        }
        function getPourcentage(){
            return $this->pourcentage;
        }
        function getDuree(){
            return $this->duree;
        }
        function getidprod(){
            return $this->id_prod;
        }
       
     
    }


?>