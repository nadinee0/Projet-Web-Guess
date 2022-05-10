
<?php
include 'headerindex.php';
include_once '..\Controller\order.php';
$commande = new commandes();
$listeC = $commande->getOrders();

?>

<main class="main">

	<div class="page-content">
		<div class="cart">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 pt-5">
						<table class="table table-cart table-mobile mt-5 ">
							<thead>
								<tr>
                                    <th scope="col">Id commande</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">&nbsp;</th>
								</tr>
							</thead>

							<tbody>
                                <?php foreach($listeC as $commande){?>
                                        <tr>
                                            <td><?php echo $commande['comm_id']; ?></td>
                                            <td><?php echo $commande['date']; ?></td>
                                            
                                            <td><a href="command_details.php?id_command=<?php echo $commande['comm_id']; ?>" ><button class="btn btn-success"> Affichier Details</button></a> </td></button>
                                        </td>
                                        </tr>
                                <?php } ?>
							</tbody>
						</table><!-- End .table table-wishlist -->
					</div><!-- End .col-lg-9 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
		</div><!-- End .cart -->
	</div><!-- End .page-content -->
</main><!-- End .main -->
<script src="assets/js/cart.js"></script>
<?php
include 'footer.php';
?>