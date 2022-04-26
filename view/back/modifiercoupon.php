<?php
    include 'header.php';
    //include '../../config.php';
    include '../../controller/coupon.php';
  
    $error = "";

    // create coupon
    $coupon = null;

    // create an instance of the controller
    $coupona=new couponA();
    if (
        isset($_POST["id"]) &&
		isset($_POST["coupon"]) &&		
        isset($_POST["pourcentage"]) 
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['coupon']) &&
            !empty($_POST["pourcentage"])
        ) {
            $coupon = new coupon(
                $_POST['id'],
				$_POST['coupon'],
                $_POST['pourcentage']
            );
            $coupona->modifiercoupon($coupon,$_POST['id']);
            echo '<script>window.location.replace("affichercoupon.php");</script>';
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
				$coupon = $coupona->recuperercoupon($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label >pourcentage:
                        </label>
                    </td>
                    <td><input type="pourcentage" name="pourcentage" id="id" value="<?php echo $coupon['pourcentage']; ?>" max="3000"></td>
                </tr>
				<tr>
                    <td>
                        <label for="coupon">coupon:
                        </label>
                    </td>
                    <td><input type="text" name="coupon" id="coupon" value="<?php echo $coupon['coupon']; ?>" maxlength="500"></td>
                </tr>
                <tr style="display:none;">
                    <td>
                        <label >
                        </label>
                    </td>
                    <td><input type="hidden" name="id" value="<?php echo $coupon['id']; ?>" maxlength="500"></td>
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