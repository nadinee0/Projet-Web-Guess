<?php

include_once dirname(__FILE__) .'\..\config.php';

class produits{
    function afficherProduits(){
        $sql="select * from products";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSorted(){
        $sql="select * from products order by ".$_POST['tri'];
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            
            return $liste->fetchAll();
        }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherProduitsSearch(){
        $sql="select * from products where nom like '%".$_POST['keyword']."%'";
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