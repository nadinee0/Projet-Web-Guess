<head>
<Meta charset="utf-8" http-equiv="Content-Type" content="text/html" >
        <TITLE>crud promotion</TITLE> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type= "text/css" href= "publicity-style.css"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>


<?PHP 
$sql = "SELECT * FROM `livraison`;";
include "../controller/livraisonC.php";
$livraisonCvar =new livraisonC();
$listeLivraisons=$livraisonCvar->afficherlivraisons();
?>
<center>
<div id="source0">

<table border="3">
<tr>
<td>id</td>
<td>adresse</td>
<td>ref_com</td>
<td>supprimer</td>
<td>modifier</td>
</tr>
</div>

</center>

<?PHP
foreach($listePromotions as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	<td><?PHP echo $row['ref_com']; ?></td>
	<td><form method="POST" action="supprimerPromotion.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	
	
	
	<td><a href="modifierLivraison.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>