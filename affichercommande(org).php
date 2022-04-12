<head>
<Meta charset="utf-8" http-equiv="Content-Type" content="text/html" >
        <TITLE>Commande</TITLE> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type= "text/css" href= "publicity-style.css"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>


<?PHP 
include "../controller/commandeC.php";


$commandeCvar =new commandeC();
$listecommandes=$commandeCvar->affichercommandes();
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
<td>Numéro telephone</td>
<td>ville</td>
<td>adresse</td>
<td>nomProduit</td>
<td>mode Payement</td>
<td>supprimer</td>
<td>modifier</td>
</tr>
</div>

</center>

<?PHP
foreach($listecommandes as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['ville']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
   <td><?PHP echo $row['nomProduit']; ?></td>
   <td><?PHP echo $row['modeP']; ?></td>
	<td><form method="POST" action="supprimercommande.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	
	
	
	<td><a href="modifiercommande.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>