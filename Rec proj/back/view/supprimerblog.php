<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../controller/blog.php';
$bloga=new blogA();
	$bloga->supprimerblog($_GET["id"]);
	header('Location:gestionblog.php');
?>