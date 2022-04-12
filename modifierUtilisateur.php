<?php
    //include_once '../Model/utilisateur.php';
    include_once '../../controller/utilisateurC.php';

    $error = "";

    // create user
    $utilisateur = null;

    // create an instance of the controller
    $userC = new utilisateurC();
    if (
        isset($_POST["id"]) &&
        isset($_POST["nom"]) &&
		isset($_POST["prenom"]) &&		
        isset($_POST["naissance"]) &&
		isset($_POST["email"]) && 
    isset($_POST["password"]) &&
    isset($_POST["type"])    
    )
     {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['nom ']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["naissance"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["password"])&&
            !empty($_POST["type"])
        ) {           
            $utilisateur = new utilisateur(
                $_POST['id'],
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['naissance'],
                $_POST['email'],
                $_POST['password'],
                $_POST['type']
            );
            $userC->modifierUtilisateur($utilisateur, $_POST["id"]);
            header('Location:gestionUtilisateur.php');
        }
        else
            $error = "Missing information";
            //echo $_POST["titre"].'---'.$_POST['contenu'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];

    }    
?>
<?php
include 'header.php';

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <button class="btn btn-primary"><a href="gestionUtilisateur.php" style="color:white;">Retour à la liste des utilisateurs</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id'])){
				$utilisateur= $userC->recupererUtilisateur($_POST['id']);
		?>
            <section class="content">
      <div class="container-fluid">
          
        <div class="row">
          <!-- left column -->
          <div class="col-md-6" style="margin: 0 auto;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
        <form action="" method="POST">
                
                  <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputEmail1"> id:</label>
                  <input type="text" name="id" class="form-control"  value="<?php echo $utilisateur['id']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">nom:</label>
                  <input type="text" name="nom" class="form-control"  value="<?php echo $utilisateur['nom']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">prenom:</label>
                  <input type="text" name="prenom" class="form-control"  value="<?php echo $utilisateur['prenom']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">naissance :</label>
                  <input type="date" name="naissance" class="form-control"  value="<?php echo $utilisateur['naissance']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">email :</label>
                  <input type="text" name="email" class="form-control"  value="<?php echo $utilisateur['email']; ?>" >
                  </div>
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">password :</label>
                  <input type="text" name="password" class="form-control"  value="<?php echo $utilisateur['password']; ?>" >
                  </div>
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">type :</label>
                  <input type="text" name="type" class="form-control"  value="<?php echo $utilisateur['type']; ?>" >
                  </div>        
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-primary">Annuler</button>

                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
            </div>
            </div>
            
		<?php
		}
		?>
        </div>
<?php
include 'footer.php';

?>