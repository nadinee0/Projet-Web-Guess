<?php
    include 'header.php';
    //include '../../config.php';
    include '../../controller/category.php';
  
    $error = "";

    // create category
    $category = null;

    // create an instance of the controller
    $categorya=new categoryA();
    if (
        isset($_POST["id"]) &&
		isset($_POST["nom"]) 
        
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['nom'])  
        ) {
            $category = new category(
                $_POST['id'],
				$_POST['nom']
            );
            $categorya->modifiercategory($category,$_POST['id']);
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
			
		<?php
			if (isset($_POST['id'])){
				$category = $categorya->recuperercategory($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID">id-category:
                        </label>
                    </td>
                    <td><input type="number" name="id" id="id" value="<?php echo $category['id']; ?>" max="3000"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $category['nom']; ?>" maxlength="30"></td>
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