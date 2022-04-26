<?php 

$myref = $_GET['ref'];
include_once "C:/xampp/htdocs/Atelierphp/proj/proj/controller/reclamationC.php";

$ReclamationC= new reclamationC();
$ReclamationC->supprimer($myref); 
header('Location:afficherRec.php');




?>