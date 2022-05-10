<?php
    class coupon{
        private $id=null;
        private $coupon=null;
        private $pourcentage=null;
     
      
        
        //private $password=null;
        function __construct($id, $coupon, $pourcentage){
            $this->id=$id;
            $this->coupon=$coupon;
            $this->pourcentage=$pourcentage;
          
          
        }
        function getId(){
            return $this->id;
        }
        function getcoupon(){
            return $this->coupon;
        }
        function getpourcentage(){
            return $this->pourcentage;
        }
       
     
    }


?>