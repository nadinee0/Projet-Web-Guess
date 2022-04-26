<?php
include 'header.php';
//include '../../config.php';
include_once $_SERVER["DOCUMENT_ROOT"].'/proj/controller/coupon.php';
$coupona=new couponA();
$listecoupon=$coupona->affichercouponback(); 
?>

<body>
	    <button><a href="ajouterAdherent.php">Ajouter un article</a></button>
		<center><h1>Liste des coupons</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>coupon</th>
				<th>pourcentage</th>
				
				
			</tr>
			<?php
				foreach($listecoupon as $coupon){
			?>
			<tr>
				<td><?php echo $coupon['id']; ?></td>
				<td><?php echo $coupon['coupon']; ?></td>
				<td><?php echo $coupon['pourcentage']; ?></td>
			
				<td>
					<form method="POST" action="modifiercoupon.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $coupon['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimercoupon.php?id=<?php echo $coupon['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>



        <?php
include 'footer.php';
?>