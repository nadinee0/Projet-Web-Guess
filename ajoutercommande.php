<?PHP
include "C:\\xampp\\htdocs\\proj\\model\\commande.php";
include "C:\\xampp\\htdocs\\proj\\controller\\commandeC.php";


if (isset($_POST['id']) and isset($_POST['ville']) and isset($_POST['adresse'])and isset($_POST['nomProduit'])and isset($_POST['modeP']) )
{
    $id=$_POST['id'];
    $ville=$_POST['ville'];
    $adresse=$_POST['adresse'];
    $nomProduit=$_POST['nomProduit'];
    $modeP=$_POST['modeP'];


    
    $commandevar = new commande($id,$ville,$adresse,$nomProduit,$modeP);
    $commandeCvar= new commandeC() ;
    $commandeCvar->ajoutercommande($commandevar);
    header('Location: affichercommande.php');
}
    else{
        echo "verifier les champs";
    }

?>