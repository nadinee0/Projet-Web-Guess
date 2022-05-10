<?PHP
include "C:\\xampp\\htdocs\\proj\\model\\cart.php";
include "C:\\xampp\\htdocs\\proj\\controller\\cart.php";

if (isset($_POST['id_Produit']) and isset($_POST['Nom_produit']) and isset($_POST['quantite'])and isset($_POST['Prix'])and isset($_POST['total']) and isset($_POST['id_Panier']) )
{
    $id_Produit=$_POST['id_Produit'];
    $Nom_produit=$_POST['Nom_produit'];
    $quantite=$_POST['quantite'];
    $Prix=$_POST['Prix'];
    $total=$_POST['total']->somme();
    $id_Panier=$_POST['id_Panier'];



    
    $cartvar = new cart($id_Panier,$id_Produit,$Nom_produit,$quantite,$Prix,$total);
    $cartCvar= new cartC() ;
    $cartCvar->ajouterpanier($cartvar);
    header('Location: afficherpanier.php');
}
    else{
        echo "verifier les champs";
    }

?>