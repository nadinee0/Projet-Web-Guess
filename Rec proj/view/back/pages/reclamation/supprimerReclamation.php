<?php
 
 include_once "../../../../controller/reclamationC.php";
 include_once "../../../../model/reclamation.php";
$reclamationC=new reclamationC();

if(isset($_POST['supprimer'])){
   
   $reclamationC->supprimerreclamation($_POST['id']);
   header('location: listReclamation.php');
 } 

 ?>