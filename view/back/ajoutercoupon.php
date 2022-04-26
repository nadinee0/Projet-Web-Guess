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
		isset($_POST["coupon"]) &&		
        isset($_POST["pourcentage"]) 
    ) {
        if (
			!empty($_POST['coupon']) &&
            !empty($_POST["pourcentage"]) 
        ) {
            $coupon = new coupon(
                null,
				$_POST['coupon'],
                $_POST['pourcentage']
            );
            $coupona->ajoutercoupon($coupon);
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
        <button><a href="affichercoupons.php">Retour à la liste des coupons</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                
				<tr>
                    <td>
                        <label for="coupon">coupon:
                        </label>
                    </td>
                    <td><input type="text" name="coupon" id="coupon" maxlength="500"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pourcentage">pourcentage:
                        </label>
                    </td>
                    <td><input type="float" name="pourcentage" id="pourcentage" ></td>
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