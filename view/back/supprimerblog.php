<?php
include '../../controller/blog.php';
$bloga=new blogA();
	$bloga->supprimerblog($_GET["id"]);
	header('Location:gestionblog.php');
?>