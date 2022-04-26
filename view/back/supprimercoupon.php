<?php
	include 'header.php';
    //include '../../config.php';
    include '../../controller/coupon.php';
	$coupon=new couponA();
	$coupon->supprimercoupon($_GET["id"]);
	echo '<script>window.location.replace("affichercoupon.php");</script>';
	?>

<?php
include 'footer.php';
?>