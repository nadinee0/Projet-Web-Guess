<?PHP
include "C:\\xampp\\htdocs\\proj\\controller\\cart.php";

$cartCvar=new cartC();
if (isset($_POST["id_Produit"])){
	$cartCvar->supprimerpanier($_POST["id_Produit"]);
	header('Location: panier.php');
}

?>