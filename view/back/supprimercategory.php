<?php
	include 'header.php';
    //include '../../config.php';
    include '../../controller/category.php';
	$category=new categoryA();
	$category->supprimercategory($_GET["id"]);
	header('Location:affichercategory.php');
?>

<?php
include 'footer.php';
?>