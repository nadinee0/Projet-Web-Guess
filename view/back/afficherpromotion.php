<?php
include 'header.php';
//include '../../config.php';
include $_SERVER["DOCUMENT_ROOT"].'/proj/controller/promotion.php';
$promotiona=new promotionA();
$listepromotion=$promotiona->afficherpromotionback(); 
?>

<body>
	    <button><a href="ajouterAdherent.php">Ajouter un article</a></button>
		<center><h1>Liste des promotions</h1></center>
		<form action="searchpromotion.php" method="get" style="text-align:center;">
		<input
			type="text"
			placeholder="Enter your search term"
			name="search"
			required>
		<button type="submit" name="submit">Search</button>
		</form>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>id produit</th>
				<th>pourcentage</th>
				<th>duree</th>
				
				
			</tr>
			<?php
				foreach($listepromotion as $promotion){
			?>
			<tr>
				<td><?php echo $promotion['id']; ?></td>
				<td><?php echo $promotion['id_prod']; ?></td>
				<td><?php echo $promotion['pourcentage']; ?></td>
				<td><?php echo $promotion['duree']; ?></td>
			
				<td>
					<form method="POST" action="modifierpromotion.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $promotion['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerpromotion.php?id=<?php echo $promotion['id']; ?>">Supprimer</a>
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