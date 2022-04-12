<?php
include 'header.php';
//include '../../config.php';
include $_SERVER["DOCUMENT_ROOT"].'/proj/controller/product.php';
$producta=new productA();
$listeproduct=$producta->afficherproductback(); 
?>

<body>
	    <button><a href="ajouterproduct.php">Ajouter un produit</a></button>
		<center><h1>Liste des produits</h1></center>
		<table border="1" align="center">
			<tr>
				<th>ID</th>
				<th>description</th>
				<th>prix</th>
				<th>quantite</th>
				<th>titre</th>
				
			</tr>
			<?php
				foreach($listeproduct as $product){
			?>
			<tr>
				<td><?php echo $product['ID']; ?></td>
				<td><?php echo $product['description']; ?></td>
				<td><?php echo $product['prix']; ?></td>
				<td><?php echo $product['quantite']; ?></td>
				<td><?php echo $product['titre']; ?></td>
				<td>
					<form method="POST" action="modifierproduct.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $product['ID']; ?> name="ID">
					</form>
				</td>
				<td>
					<a href="supprimerproduct.php?ID=<?php echo $product['ID']; ?>">Supprimer</a>
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