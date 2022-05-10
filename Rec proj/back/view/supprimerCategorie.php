<?php
 
 include_once "../../../../back/controller/categorieC.php";
 include_once "../../../../back/model/categorie.php";
$categorieC=new categorieC();

if(isset($_POST['supprimer'])){
   
   $categorieC->supprimercategorie($_POST['id']);
   header('location: listcategorie.php');
 } 

 ?>