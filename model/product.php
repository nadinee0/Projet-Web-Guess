<?php
    class product{
        private $ID=null;
        private $description=null;
        private $prix=null;
        private $quantite=null;
        private $titre=null;
        
        //private $password=null;
        function __construct($ID, $description, $prix, $quantite,$titre){
            $this->ID=$ID;
            $this->description=$description;
            $this->prix=$prix;
            $this->quantite=$quantite;
            $this->titre=$titre;
        }
        function getID(){
            return $this->ID;
        }
        function getdescription(){
            return $this->description;
        }
        function getprix(){
            return $this->prix;
        }
        function getquantite(){
            return $this->quantite;
        }
        function gettitre(){
            return $this->titre;
        }
        
        
        
    }


?>