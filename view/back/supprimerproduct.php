<?php
	include 'header.php';
    //include '../../config.php';
    include '../../controller/product.php';
	$product=new productA();
	$product->supprimerproduct($_GET["ID"]);
	header('Location:afficherproducts.php');
?>

<?php
include 'footer.php';
?>