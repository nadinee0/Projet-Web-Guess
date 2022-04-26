

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form de reclamation</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>



<?php
$sql = "SELECT * FROM `reclamation`;";
include_once "../controller/reclamationC.php";

$ReclamationC= new reclamationC();
$var=$ReclamationC->afficher();

?>

<center>
   
<table border='3' width='300' cellspacing='0'>
<tr>
<td>ref</td>
<td>nom</td>
<td>email</td>


</tr>
</center>
<?php
foreach($var as $row){ ?>
    <tr>
    <td> <?php echo $row['ref']; ?>   </td>
    <td> <?php echo $row['nom']; ?>   </td>
    <td> <?php echo $row['email']; ?>   </td>
    
   
    <td><form method="POST" action="supprimerRec.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['ref']; ?>" name="ref">
	</form>
</td>
<?php
}
?>




</table>
