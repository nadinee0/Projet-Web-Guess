<?php
	include 'header.php';
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../controller/category.php';
	$category=new categoryA();
	$category->supprimercategory($_GET["id"]);
	header('Location:affichercategory.php');
?>

<?php
include 'footer.php';
?>