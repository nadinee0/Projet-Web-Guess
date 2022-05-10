

<?PHP 
include "../controller/cart.php";


$cartCvar =new cartC();
$listepaniers=$cartCvar->afficherpaniers();
?>
<center>

<form action="" method="POST">
<table>
<table border="3"> 
<tr>
<link rel="stylesheet" href="style.css">
</div>
               <div class="col-lg-12">
                        <div class="card">
                            <div  class="card-body"><p  align="center"><u>Votre Commande est Bien enregistré </u>
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
										 
                                  
												
                                            </tr>
                                        </thead>
                                        <tbody>
 
<tr>
<td>id panier</td>
<td>id Produit</td>
<td>Nom produit</td>
<td>quantite</td>
<td>Prix</td>
<td>total</td>
<td>supprimer</td>
<td>modifier</td>
</tr>
</div>

</center>

<?PHP
foreach($listepaniers as $row){
	?>
	<tr>
	<td><?PHP echo $row['id_Panier']; ?></td>
	<td><?PHP echo $row['id_Produit']; ?></td>
    <td><?PHP echo $row['nom_produit']; ?></td>
   <td><?PHP echo $row['quantite']; ?></td>
   <td><?PHP echo $row['prix']; ?></td>
   <td><?PHP echo $row['total']; ?></td>
	<td><form method="POST" action="supprimerpanier.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id_Panier']; ?>" name="id_Panier">
	</form>
	</td>
	
	
	
	<td><a href="modifierpanier.php?id_Panier=<?PHP echo $row['id_Panier']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>