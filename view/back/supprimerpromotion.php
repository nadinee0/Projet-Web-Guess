<?php
	include 'header.php';
    //include '../../config.php';
    include '../../controller/promotion.php';
	$promotion=new promotionA();
	$promotion->supprimerpromotion($_GET["id"]);
	echo '<script>window.location.replace("afficherpromotion.php");</script>';
	?>

<?php
include 'footer.php';
?>