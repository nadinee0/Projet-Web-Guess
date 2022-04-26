<?php
 
 include_once "../../../../controller/categorieC.php";
 include_once "../../../../model/categorie.php";
$categorieC=new categorieC();

if(isset($_POST['supprimer'])){
   
   $categorieC->supprimercategorie($_POST['id']);
   header('location: listcategorie.php');
 } 

 ?>