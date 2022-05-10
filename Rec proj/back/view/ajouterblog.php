<?php
include_once 'header.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../controller/blog.php';

    $error = "";

    // create blog
    $blog = null;

    // create an instance of the controller
    $blogC = new blogA();
    if (
        isset($_POST["titre"]) &&
		isset($_POST["contenu"]) &&		
        isset($_POST["categorie"]) &&
       // isset($_POST["choosefile"]) &&
		isset($_POST["date"])  
    ) {
        if (
            !empty($_POST["titre"]) && 
			!empty($_POST['contenu']) &&
            !empty($_POST["categorie"]) && 
            //!empty($_POST["choosefile"]) && 
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
            $filename = $_FILES["choosefile"]["name"];
            $tempname = $_FILES["choosefile"]["tmp_name"];  
            $folder = $filepath."/imgblog/".$filename;   
            if (move_uploaded_file($tempname, $folder)) {
              $msg = "Image uploaded successfully";
            }else{
              $msg = "Failed to upload image";
               }
               echo $msg;
            
            $blogC->ajouterblog($blog,$filename);

            header('Location:gestionblog.php');
        }
        else
            $error = "Missing information";
    }    
?>
<?php
//include 'header.php';

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ajouter article</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ajouter article</li>
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
                <h3 class="card-title">Formulaire d'ajout</h3>
              </div>
        <form name="ajoutblog" action="" method="POST" enctype="multipart/form-data" onsubmit="return ajouterblog()" >
                
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
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="choosefile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
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

<script>
function ajouterblog() {
    var titre = document.ajoutblog.titre.value;
    var contenu = document.ajoutblog.contenu.value;
    var categorie = document.ajoutblog.categorie.value;
    var date = document.ajoutblog.date.value;
    //var categorie = document.ajoutblog.titre.value;
    var img = document.ajoutblog.choosefile;

  
   var verif = -1;
    if (titre.length == 0) {
      alert("Le titre est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(titre)) {   
      alert("le titre doit  comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (contenu.length == 0) {
      alert("contenu est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(contenu)) {   
      alert("le contenu doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (date.length == 0) {
        alert("date est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      if (categorie.length == 0) {
        alert("categorie est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      if (testNumber(categorie) == false) {   
        alert("Categorie ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;
      if (img.length == 0) {
        alert("Image est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
    if (verif == 1) {  
      return true;
    }
  }
</script>
<?php
include_once 'footer.php';
?>