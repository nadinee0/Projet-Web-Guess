<?php
    class category{
        private $id=null;
        private $nom=null;
        
        
        //private $password=null;
        function __construct($id, $nom){
            $this->id=$id;
            $this->nom=$nom;
           
        }
        function getid(){
            return $this->id;
        }
        function getnom(){
            return $this->nom;
        }
      
        
        
        
    }


?>