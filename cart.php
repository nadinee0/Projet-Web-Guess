<?php

include_once dirname(__FILE__) .'\..\config.php';


class paniers{
    function getCurrentCart(){
        $sql="select id from cart where commanded='false'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll()[0]["id"];
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherCart(int $id){
        $sql="select * from cart,products,cart_products WHERE cart.id=cart_products.id_panier and products.ref=cart_products.id_produit and cart.id=".$id;
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function addToCart(int $id_produit,int $id_panier,int $quantite){
        $sql="insert into cart_products (id_panier	,id_produit	,quantite) values(".$id_panier." , ".$id_produit." , ".$quantite.");";
        $db = config::getConnexion();
        try{
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function deleteFromCart(int $id_produit,int $id_panier){
        $sql="delete from cart_products where id_panier=".$id_panier." and id_produit=".$id_produit;
        $db = config::getConnexion();
        try{
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function confirmCart(int $id){
        $sql="update cart set commanded='true' where id=".$id;
        $db = config::getConnexion();
        try{
            $db->query($sql);
            $sql="insert into cart (commanded) values('false')";
            $db->query($sql);
            return true;
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }



}