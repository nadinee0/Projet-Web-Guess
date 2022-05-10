<?php
    include 'header.php';
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath.'/../controller/category.php';
  
    $error = "";

    // create category
    $category = null;

    // create an instance of the controller
    $categorya=new categoryA();
    if (
		isset($_POST["nom"]) 
    ) {
        if (
			!empty($_POST['nom'])  
        ) {
            $category = new category(
                null,
				$_POST['nom']
            );
            $categorya->ajoutercategory($category);
            header('Location:affichercategory.php');
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
        <button><a href="affichercategory.php">Retour à la liste des categories</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="30"></td>
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