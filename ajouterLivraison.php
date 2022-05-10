<?PHP
$sql = "SELECT * FROM `livraison`;";
include "C:\xampp\htdocs\proj\controller\livraisonC.php";
include "C:\xampp\htdocs\proj\model\livraison.php";

if (isset($_POST['id']) and isset($_POST['adresse']) and isset($_POST['ref_com']) )
{
    $id=$_POST['id'];
    $adresse=$_POST['adresse'];
    $ref_com=$_POST['ref_com'];
    
    $livraisonvar = new livraison($id,$adresse,$ref_com);
    $livraisonCvar= new livraisonC() ;
    $livraisonCvar->ajouterPromotion($livraisonvar);
    header('Location: afficherLivraison.php');
}
    else{
        echo "verifier les champs";
    }

?>