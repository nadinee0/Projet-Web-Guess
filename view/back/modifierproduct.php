<?php
    include 'header.php';
    //include '../../config.php';
    include '../../controller/product.php';
  
    $error = "";

    // create product
    $product = null;

    // create an instance of the controller
    $producta=new productA();
    if (
        isset($_POST["ID"]) &&
		isset($_POST["description"]) &&		
        isset($_POST["prix"]) &&
		isset($_POST["quantite"]) && 
        isset($_POST["titre"]) && 
        isset($_POST["category"])

    ) {
        if (
            !empty($_POST["ID"]) && 
			!empty($_POST['description']) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["quantite"]) && 
            !empty($_POST["titre"])&& 
            !empty($_POST["category"])
        ) {
            $product = new product(
                $_POST['ID'],
				$_POST['description'],
                $_POST['prix'], 
				$_POST['quantite'],
                $_POST['titre'],
                $_POST['category']
            );
            $producta->modifierproduct($product,$_POST['ID']);
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
			
		<?php
			if (isset($_POST['ID'])){
				$product = $producta->recupererproduct($_POST['ID']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID">ID-produit:
                        </label>
                    </td>
                    <td><input type="number" name="ID" id="ID" value="<?php echo $product['ID']; ?>" max="3000"></td>
                </tr>
				<tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" value="<?php echo $product['description']; ?>" maxlength="5000"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="float" name="prix" id="prix" value="<?php echo $product['prix']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="quantité">quantité:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantite" value="<?php echo $product['quantite']; ?>" id="quantite">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="titre"> titre:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="titre" id="titre" value="<?php echo $product['titre']; ?>">
                    </td>
                </tr>

                <tr>
                <td>    
                <label for="category">Categorie:</label>
                                    <?php
                                        $mysqli = NEW MySQLi('localhost','root','','produits');
                                        $resultSet = $mysqli->query("SELECT nom FROM category");
                                        ?>
                                        <select name="category" >
                                            <?php
                                            while($rows = $resultSet->fetch_assoc())
                                            {
                                                $nom = $rows['nom'];
                                                echo "<option value='$nom'>$nom</option>";
                                            }
                                            ?>
                                        </select> </br>
                 </td>                         
                </tr>



                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>

<?php
include 'footer.php';
?>