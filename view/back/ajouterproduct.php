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

                $_POST['ID'],
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
        
        <form action="" method="POST">
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

<?php
include 'footer.php';
?>