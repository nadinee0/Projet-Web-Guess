<?php
include '../../controller/commentaire.php';
$comment=new commentaireA();
	$comment->supprimercommentaire($_GET["id"]);
	header('Location:commentaires.php');
?>