<?php
	include 'header.php';
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../controller/product.php';
	$product=new productA();
	$product->supprimerproduct($_GET["ID"]);
	header('Location:afficherproducts.php');
?>

<?php
include 'footer.php';
?>