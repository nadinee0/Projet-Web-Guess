<?php
 
 include_once "C:/xampp/htdocs/Atelierphp/integration/back/controller/reclamationC.php";
 include_once "C:/xampp/htdocs/Atelierphp/integration/back/model/reclamation.php";
$reclamationC=new reclamationC();

if(isset($_POST['supprimer'])){
   
   $reclamationC->supprimerreclamation($_POST['id']);
   header('location: listReclamation.php');
 } 

 ?>