<?php
include '../../controller/utilisateurC.php';
$user=new utilisateurC();
	$user->supprimerutilisateur($_GET["id"]);
	header('Location:gestionUtilisateur.php');
?>