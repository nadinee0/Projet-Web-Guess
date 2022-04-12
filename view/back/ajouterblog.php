<?php
    //include_once '../Model/blog.php';
    include_once '../../controller/blog.php';

    $error = "";

    // create blog
    $blog = null;

    // create an instance of the controller
    $blogC = new blogA();
    if (
        isset($_POST["titre"]) &&
		isset($_POST["contenu"]) &&		
        isset($_POST["categorie"]) &&
		isset($_POST["date"])  
    ) {
        if (
            !empty($_POST["titre"]) && 
			!empty($_POST['contenu']) &&
            !empty($_POST["categorie"]) && 
			!empty($_POST["date"]) 
        ) {           
            $blog = new blog(
                null,
				        $_POST['titre'],
                $_POST['contenu'], 
				        $_POST['date'],
                $_POST['categorie'],
                0
            );
            $blogC->ajouterblog($blog);

            header('Location:gestionblog.php');
        }
        else
            $error = "Missing information";
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
    <button class="btn btn-primary"><a href="gestionblog.php" style="color:white;">Retour à la liste des blogs</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
			
	
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
                  <label for="exampleInputEmail1">Titre:</label>
                  <input type="text" name="titre" class="form-control" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Contenu :</label>
                  <input type="text" name="contenu" class="form-control"  maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Categorie :</label>
                  <input type="text" name="categorie" class="form-control" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Date :</label>
                  <input type="date" name="date" class="form-control" >
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
            
		
        </div>
<?php
include 'footer.php';

?>