
<?php 
include 'headerindex.php';
include_once '..\Controller\cart.php';
include_once '..\Controller\order.php';
$panier = new paniers();

if( $_SERVER['REQUEST_METHOD']=="POST") {
    $listeP = $panier->afficherCartCommand($_POST["id_command"]);
    //Pdf
    $message = '';
    $output = '
    <h1 style="text-align:center;color:#c66">Details De La commande num '.$_POST["id_command"].'
    </h1><table style="width:80%;font-size:18px;color:black">
        <tr style="color:#a6c76c">
            <td style="padding:10px">
                <h5 class="text-grey mt-1 mr-1 ml-5">Nom du Produit</h5>
            </td>
            <td style="padding:10px">
                <h5 >Quantité</h5> 
            </td style="padding:10px">
            <td style="padding:10px">
                <h5 >Prix</h5> 
            </td>
        </tr>
    ';
    $sum=0;
    foreach($listeP as $p)
    {
    $sum+=$p["prix"]*$p["quantite"];
     $output .= '
     <tr style="color:black">
        <td style="padding:10px">
            <h5 class="font-weight-bold">'.$p["nom"].'</h5>
        </td>
        <td style="padding:10px">
            <h5 >'. $p["quantite"].'</h5>
        </td style="padding:10px">
        <td style="padding:10px">
            <h5 >'. $p["quantite"] * $p["prix"].'DT.</h5> 
        </td>
     </tr>';
    }
    $output .= '
    </table>
    <h2  style="margin-left:120px;font-size:21px;color:#c66">Totale : '. $sum .'DT</h2>
    </div>
    ';


    try{
    include('pdf.php');
    $file_name = md5(rand()) . '.pdf';
    $html_code = '<link rel="stylesheet" href="pdfstyles.css">';
    $html_code .= $output;
    $pdf = new Pdf();

    $pdf->set_base_path("C:\xampp\htdocs\View\Front\pdfstyles.css");
    $pdf->load_html($html_code);
    $pdf->render();
    $file = $pdf->output();
    file_put_contents($file_name, $file);
    ob_start();
    //$pdf->stream($file_name);
    echo "<script> window.location.replace('/view/".$file_name."');</script>";


    }catch(Error $e){
        die ($e);
    }

}else{

    $listePanier = $panier->afficherCart($_GET["id_command"]);
}?>

<main class="main">

	<div class="page-content">
		<div class="cart">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 pt-5">
						<table class="table table-cart table-mobile mt-5 ">
							<thead>
								<tr>
									<th>Prod</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php $sum=0; foreach($listePanier as $p){ $sum+=$p["quantite"] * $p["prix"];?>
									<tr>
										<td class="product-col">
											<div class="product">
												<figure class="product-media">
													<a href="#">
														<img src=<?php echo "assets/images/products/".$p["image"] ?> alt="Product image">
													</a>
												</figure>

												<h3 class="product-title">
													<a href="#"><?php echo $p["nom"] ?></a>
												</h3><!-- End .product-title -->
											</div><!-- End .product -->
										</td>
										<td class="price-col"><?php echo $p["prix"]."DT"?></td>
										<td class="quantity-col">
											<div class="cart-product-quantity">
												<input disabled type="number" class="form-control" value=<?php echo $p["quantite"] ?> min="1" max="10" step="1" data-decimals="0" required>
											</div><!-- End .cart-product-quantity -->                                 
										</td>
										<td class="total-col"><?php echo $p["quantite"] * $p["prix"]."DT"?></td>
										
									</tr>
								<?php } ?>
							</tbody>
						</table><!-- End .table table-wishlist -->

						<div class="cart-bottom">
							Total: <?php echo $sum."DT"?>
							<form method="post" style="width: 50%;"><input style="display:none" value="<?php echo $_GET["id_command"] ?>" name="id_command"></input> <button type="submit" href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">Generer PDF</a></form>
						</div><!-- End .cart-bottom -->
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