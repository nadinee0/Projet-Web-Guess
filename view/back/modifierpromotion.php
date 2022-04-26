<?php
    include 'header.php';
    //include '../../config.php';
    include '../../controller/promotion.php';
  
    $error = "";

    // create promotion
    $promotion = null;

    // create an instance of the controller
    $promotiona=new promotiona();
    if (
        isset($_POST["id"]) &&
		isset($_POST["pourcentage"]) &&	
        isset($_POST["id_prod"]) &&			
        isset($_POST["duree"]) 
		
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['pourcentage']) &&
            !empty($_POST['id_prod']) &&
            !empty($_POST["duree"])
        ) {
            $promotion = new promotion(
                $_POST['id'],
				$_POST['pourcentage'],
                $_POST['duree'],
                $_POST['id_prod']
            );
            $promotiona->modifierpromotion($promotion,$_POST['id']);
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
        <button><a href="afficherListeAdherents.php">Retour à la liste des produits</a></button>

        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id'])){
				$promotion = $promotiona->recupererpromotion($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label >duree:
                        </label>
                    </td>
                    <td><input type="duree" name="duree" id="id" value="<?php echo $promotion['duree']; ?>" max="3000"></td>
                </tr>
				<tr>
                    <td>
                        <label for="pourcentage">pourcentage:
                        </label>
                    </td>
                    <td><input type="text" name="pourcentage" id="pourcentage" value="<?php echo $promotion['pourcentage']; ?>" maxlength="500"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pourcentage">id produit:
                        </label>
                    </td>
                    <td><input type="text" name="id_prod" id="id_prod" value="<?php echo $promotion['id_prod']; ?>" maxlength="500"></td>
                </tr>
                <tr style="display:none;">
                    <td>
                        <label >
                        </label>
                    </td>
                    <td><input type="hidden" name="id" value="<?php echo $promotion['id']; ?>" maxlength="500"></td>
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