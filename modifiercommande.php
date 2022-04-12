<HTML>
<head>

<Meta charset="utf-8" http-equiv="Content-Type" content="text/html" >
        <TITLE>Modifier Produit </TITLE> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type= "text/css" href= "publicity-style.css"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>


</head>
<body>
<?PHP
include"../model/commande.php" ;
include"../controller/commandeC.php";
if(isset($_GET['id']))
{
$commandeCvar= new commandeC();
$result=$commandeCvar->recuperercommande($_GET['id']);
foreach($result as $row)
{
$id=$row['id'];
$ville=$row['ville'];
$adresse=$row['adresse'];
$nomProduit=$row['nomProduit'];
$modeP=$row['modeP'];

?>
<form method="POST">
<table>
<caption>Modifier commande</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>ville</td>
<td><input type="text" name="ville" value="<?PHP echo $ville ?>"></td>
</tr>
<tr>
<td>adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>nomProduit</td>
<td><input type="text" name="nomProduit" value="<?PHP echo $nomProduit ?>"></td>
</tr>
<tr>
<td>modeP</td>
<td><input type="text" name="modeP" value="<?PHP echo $modeP ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP 
}
}
if(isset($_POST['modifier']))
{
$commandevar=new commande($_POST['id'],$_POST['ville'],$_POST['adresse'],$_POST['nomProduit'],$_POST['modeP']);
$commandeCvar->modifiercommande($commandevar,$_POST['id_ini']);
echo $_POST['id_ini'];
header('Location: affichercommande.php');
}
?>
</body>
</HTML>
