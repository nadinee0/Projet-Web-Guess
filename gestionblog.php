<?php
include 'header.php';
//include '../../config.php';
include '../../controller/blog.php';
$bloga=new blog();
$listeblog=$bloga->afficherblogback(); 
?>

<body>
	    <button><a href="ajouterAdherent.php">Ajouter un article</a></button>
		<center><h1>Liste des articles</h1></center>
		<table border="1" align="center">
			<tr>
				<th>NumAdherent</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Adresse</th>
				<th>Email</th>
				<th>DateInscription</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeblog as $article){
			?>
			<tr>
				<td><?php echo $article['id']; ?></td>
				<td><?php echo $article['titre']; ?></td>
				<td><?php echo $article['contenu']; ?></td>
				<td><?php echo $article['categorie']; ?></td>
				<td><?php echo $article['date']; ?></td>
				<td><?php echo $article['jaime']; ?></td>
				<td>
					<form method="POST" action="modifieradherent.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP  ?> name="NumAdherent">
					</form>
				</td>
				<td>
					<a href="supprimeradherent.php?NumAdherent=<?php  ?>">Supprimer</a>
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