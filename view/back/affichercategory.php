<?php
include 'header.php';
//include '../../config.php';
include $_SERVER["DOCUMENT_ROOT"].'/proj/controller/category.php';
$categorya=new categoryA();
$listecategory=$categorya->affichercategoryback(); 
?>

<body>
	    <button><a href="ajoutercategory.php">Ajouter une categorie</a></button>
		<center><h1>Liste des categories</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>nom</th>
		
			</tr>
			<?php
				foreach($listecategory as $category){
			?>
			<tr>
				<td><?php echo $category['id']; ?></td>
				<td><?php echo $category['nom']; ?></td>
				
				<td>
					<form method="POST" action="modifiercategory.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $category['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimercategory.php?id=<?php echo $category['id']; ?>">Supprimer</a>
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