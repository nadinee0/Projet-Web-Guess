<?PHP
include "C:\xampp\htdocs\proj\controller\livraisonC.php";
$sql = "SELECT * FROM `livraison`;";
$livraisonCvar=new livraisonC();
if (isset($_POST["id"])){
	$livraisonCvar->supprimerLivraison($_POST["id"]);
	header('Location: commandeback.php');
}

?>