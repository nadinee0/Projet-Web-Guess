<?php
    include 'header.php';
    //include '../../config.php';
    include '../../controller/promotion.php';
  
    $error = "";

    // create promotion
    $promotion = null;
    

    // create an instance of the controller
    $promotiona=new promotionA();
    if (
		isset($_POST["pourcentage"]) &&		
        isset($_POST["id_prod"]) &&		
        isset($_POST["duree"]) 
    ) {
        if (
			!empty($_POST['pourcentage']) &&
            !empty($_POST['id_prod']) &&
            !empty($_POST["duree"]) 
        ) {
            $promotion = new promotion(
                null,
				$_POST['pourcentage'],
                $_POST['duree'],
                $_POST['id_prod']
            );
            $promotiona->ajouterpromotion($promotion);
            echo '<script>window.location.replace("afficherpromotion.php");</script>';
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
        <button><a href="afficherpromotions.php">Retour à la liste des promotions</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="pourcentage">pourcentage:
                        </label>
                    </td>
                    <td><input type="text" name="pourcentage" id="pourcentage" maxlength="500"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pourcentage">id produit:
                        </label>
                    </td>
                    <td><input type="text" name="id_prod" id="id_prod" maxlength="500"></td>
                </tr>
                <tr>
                    <td>
                        <label for="duree">duree:
                        </label>
                    </td>
                    <td><input type="float" name="duree" id="duree" ></td>
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