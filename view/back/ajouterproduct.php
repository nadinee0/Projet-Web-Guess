<?php
    include_once 'header.php';
    //include '../../config.php';
    include_once '../../controller/product.php';
    include_once '../../controller/category.php';
    $categorya=new categoryA();
    $listecategory = $categorya->affichercategory();
    //var_dump($listecategory->fetchall());
  
    $error = "";

    // create product
    $product = null;

    // create an instance of the controller
    $producta=new productA();
    if (
		isset($_POST["description"]) &&		
        isset($_POST["prix"]) &&
		isset($_POST["quantite"]) && 
        isset($_POST["titre"]) &&
        isset($_POST["category"])

    ) {
        if (
			!empty($_POST['description']) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["quantite"]) && 
            !empty($_POST["titre"]) &&
            !empty($_POST["category"])
        ) {
            $product = new product(
                null,
				$_POST['description'],
                $_POST['prix'], 
				$_POST['quantite'],
                $_POST['titre'],
                $_POST['category']
            );
            $producta->ajouterproduct($product);
            header('Location:afficherproducts.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherproducts.php">Retour à la liste des produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form name="ajout" action="" method="POST" onsubmit="return ajouterproduct()">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" maxlength="1000"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="float" name="prix" id="prix" ></td>
                </tr>
                <tr>
                    <td>
                    <label for="quantité">quantité:
                        </label>
                    </td>
                    <td><input type="number" name="quantite" id="quantite" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="titre"> titre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="titre" id="titre" maxlength="30">
                    </td>
                </tr>


                <tr>
                <td>    
                <label for="category">Categorie:</label>
                <select name="category" >
                    <?php
                    foreach ($listecategory as $category){
                        $nomcateg =$category['nom'] ;
                        $idcateg =$category['id'] ;
                        echo "<option value='$idcateg'>$nomcateg</option>";
                    }
                    ?>
                     </select> </br>
                 </td>                         
                </tr>


                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>



<script>
function ajouterproduct() {
    var description = document.ajout.description.value;
    var prix = document.ajout.prix.value;
    var quantite = document.ajout.quantite.value;
    var titre = document.ajout.titre.value;
    
   var verif = -1;
    if (description.length == 0) {
      alert("La description est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(description)) {   
      alert("le description doit  comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (prix.length == 0) {
        alert("Prix est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      let isnum = /^\d+$/.test(prix);
      if (isnum == false) {   
        alert("Prix ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
      if (quantite.length == 0) {
        alert("quantite est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      isnum = /^\d+$/.test(quantite);
      if (isnum == false) {   
        alert("quantite ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
    if (titre.length == 0) {
      alert("le titre est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(titre)) {   
      alert("le titre doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
   
    if (verif == 1) {  
        alert("Merci Pour l ajout");
      return true;
    }
  }
</script>

<?php
include 'footer.php';
?>