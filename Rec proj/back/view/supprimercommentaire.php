<?php
$filepath = realpath(dirname(__FILE__));

include_once $filepath.'/../controller/commentaire.php';
$comment=new commentaireA();
	$comment->supprimercommentaire($_GET["id"]);
	header('Location:commentaires.php');
?>