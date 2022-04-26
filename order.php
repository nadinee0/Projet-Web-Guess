<?php

include_once dirname(__FILE__) .'\..\config.php';


class commandes{
    function passCommand(int $curr_cart){
        $sql="insert into command (date,cart_id) values('". date("Y-m-d")."' , '".$curr_cart."');";
        $db = config::getConnexion();
        try{
            $db->query($sql);
            
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}