<HTML>
<head>

<Meta charset="utf-8" http-equiv="Content-Type" content="text/html" >
        <TITLE>Modifier Produit </TITLE> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type= "text/css" href= "publicity-style.css"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   


</head>
<body>
<?PHP
include"../model/cart.php" ;
include"../controller/cart.php";
if(isset($_GET['id_Panier']))
{
$cartCvar= new cartC();
$result=$cartCvar->recupererpanier($_GET['id_Panier']);
foreach($result as $row)
{
$id_Panier=$row['id_Panier'];
$id_Produit=$row['id_Produit'];
$Nom_produit=$row['Nom_produit'];
$quantite=$row['quantite'];
$Prix=$row['Prix'];
$total=$row['total']->somme();

?>
<form method="POST">
<table>
<caption>Modifier panier</caption>
<tr>
<td>id_Panier</td>
<td><input type="number" name="id_Panier" value="<?PHP echo $id_Panier ?>"></td>
</tr>
<tr>
<td>id_Produit</td>
<td><input type="text" name="id_Produit" value="<?PHP echo $id_Produit ?>"></td>
</tr>
<tr>
<td>Nom_produit</td>
<td><input type="text" name="Nom_produit" value="<?PHP echo $Nom_produit ?>"></td>
</tr>
<tr>
<td>quantite</td>
<td><input type="text" name="quantite" value="<?PHP echo $quantite ?>"></td>
</tr>
<tr>
<td>Prix</td>
<td><input type="text" name="Prix" value="<?PHP echo $Prix ?>"></td>
</tr>
<tr>
<td>total</td>
<td><input type="text" name="total" value="<?PHP echo $total ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_Panier'];?>"></td>
</tr>
</table>
</form>
<?PHP 
}
}
if(isset($_POST['modifier']))
{
$cartvar=new cart($_POST['id_Panier'],$_POST['id_Produit'],$_POST['Nom_produit'],$_POST['quantite'],$_POST['Prix'],$_POST['total']);
$cartCvar->modifierpanier($cartvar,$_POST['id_ini']);
echo $_POST['id_ini'];
header('Location: afficherpanier.php');
}
?>
</body>
</HTML>
