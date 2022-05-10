<?PHP
include "C:\\xampp\\htdocs\\proj\\controller\\commandeC.php";

$commandeCvar=new commandeC();
if (isset($_POST["id"])){
	$commandeCvar->supprimercommande($_POST["id"]);
	header('Location: commandeback.php');
}

?>