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

    function getOrders(){
        $sql="SELECT command.id comm_id,date,sum(prix*quantite) totale FROM command,cart,cart_products,products where  command.cart_id=cart.id and cart_products.id_panier = cart.id and cart_products.id_produit = products.ref GROUP by cart.id;";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}