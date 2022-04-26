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
		isset($_POST["date"]) && 
        isset($_POST["jaime"]) && 
        isset($_POST["id"])
    ) {
        if (
            !empty($_POST["titre"]) && 
			!empty($_POST['contenu']) &&
            !empty($_POST["categorie"]) && 
			!empty($_POST["date"]) && 
            !empty($_POST["jaime"]) && 
            !empty($_POST["id"])
        ) {           
            $blog = new blog(
                $_POST['id'],
				$_POST['titre'],
                $_POST['contenu'], 
				$_POST['date'],
                $_POST['categorie'],
                $_POST['jaime']
            );
            $blogC->modifierblog($blog, $_POST["id"]);
            header('Location:gestionblog.php');
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
    <button class="btn btn-primary"><a href="gestionblog.php" style="color:white;">Retour à la liste des blogs</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idblog'])){
				$blog = $blogC->recupererblog($_POST['idblog']);
				
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
        <form name="blog" action="" method="POST" onsubmit="return modifierblog()">
                
                  <div class="card-body">
                  <div style="display:none;" class="form-group">
                  <label for="exampleInputEmail1">Numero Blog:</label>
                  <input type="text" name="id" class="form-control"  value="<?php echo $blog['id']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Titre:</label>
                  <input type="text" name="titre" class="form-control"  value="<?php echo $blog['titre']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Contenu :</label>
                  <input type="text" name="contenu" class="form-control"  value="<?php echo $blog['contenu']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Categorie :</label>
                  <input type="text" name="categorie" class="form-control"  value="<?php echo $blog['categorie']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Date :</label>
                  <input type="date" name="date" class="form-control"  value="<?php echo $blog['date']; ?>" >
                  </div>
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">Jaime :</label>
                  <input type="text" name="jaime" class="form-control"  value="<?php echo $blog['jaime']; ?>" >
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
<script>
function modifierblog() {
    var titre = document.blog.titre.value;
    var contenu = document.blog.contenu.value;
    var categorie = document.blog.categorie.value;
    var date = document.blog.date.value;
    var jaime = document.blog.jaime.value;

  
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
      if (!isNaN(categorie)) {   
      alert("categorie doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
      if (jaime.length == 0) {
      alert("Champ jaime est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    let isnum = /^\d+$/.test(jaime);
      if (isnum == false) {   
        alert("jaime ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;


    if (verif == 1) {  
      return true;
    }
  }


</script>
        </div>
<?php
include 'footer.php';

?>