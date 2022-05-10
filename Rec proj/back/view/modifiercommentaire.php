<?php
include_once 'header.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../controller/commentaire.php';

    $error = "";

    // create blog
    $blog = null;

    // create an instance of the controller
    $commentaire = new commentaireA();
    if (
        isset($_POST["id"]) &&
		isset($_POST["id_blog"]) &&		
        isset($_POST["commentaire"]) &&
		isset($_POST["nom"]) && 
        isset($_POST["date"]) && 
        isset($_POST["email"])
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['id_blog']) &&
            !empty($_POST["commentaire"]) && 
			!empty($_POST["nom"]) && 
            !empty($_POST["date"]) && 
            !empty($_POST["email"])
        ) {           
            $comment = new commentaire(
                $_POST['id'],
				$_POST['id_blog'],
                $_POST['commentaire'], 
				$_POST['date'],
                $_POST['nom'],
                $_POST['email']
            );
            $commentaire->modifiercommentaire($comment, $_POST["id"]);
            header('Location:commentaires.php?id='.$_POST["id_blog"]);
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
            <h1>Modifier commentaire</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Modifier commentaire</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <button class="btn btn-primary"><a href="commentaires.php?id=<?php echo $_POST["id_blog"]; ?>" style="color:white;">Retour à la liste des commentaires</a></button>
        <hr>
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['id'])){
				$commentaire = $commentaire->recuperercommentaire($_POST['id']);
				
		?>
            <section class="content">
      <div class="container-fluid">
          
        <div class="row">
          <!-- left column -->
          <div class="col-md-6" style="margin: 0 auto;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulaire de modification</h3>
              </div>
        <form name="comment" action="" method="POST" onsubmit="return modifiercomment()">
                
                  <div class="card-body">
                  <div style="display:none;" class="form-group">
                  <input type="text" name="id" class="form-control"  value="<?php echo $commentaire['id']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Id Blog:</label>
                  <input type="text" name="id_blog" class="form-control"  value="<?php echo $commentaire['id_blog']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Commentaire :</label>
                  <input type="text" name="commentaire" class="form-control"  value="<?php echo $commentaire['commentaire']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Nom :</label>
                  <input type="text" name="nom" class="form-control"  value="<?php echo $commentaire['nom']; ?>" maxlength="20">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Date :</label>
                  <input type="date" name="date" class="form-control"  value="<?php echo $commentaire['date']; ?>" >
                  </div>
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">Email :</label>
                  <input type="text" name="email" class="form-control"  value="<?php echo $commentaire['email']; ?>" >
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

        <script>
function modifiercomment() {
    var nom= document.comment.nom.value;
    var contenu = document.comment.commentaire.value;
    var email = document.comment.email.value;
    var date = document.comment.date.value;
    var idblog = document.comment.id_blog.value;

  
   var verif = -1;
    if (nom.length == 0) {
      alert("Nom est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(nom)) {   
      alert("Nom doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (contenu.length == 0) {
      alert("commentaire est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(contenu)) {   
      alert("le commentaire doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (email.length == 0) {
      alert("l'email est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    if (!isNaN(email)) {   
      alert("l'email doit comporter une Lettre");
      verif = 0;
      return false;
    } else verif = 1;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
      verif = 1;
    else{
      alert("l'email n'est pas valide");
      verif = 0;
      return false;
    }
    if (date.length == 0) {
        alert("date est obligatoire");
        verif = 0;
        return false;
      } else verif = 1;
      if (idblog.length == 0) {
      alert("Champ idblog est obligatoire");
      verif = 0;
      return false;
    } else verif = 1;
    let isnum = /^\d+$/.test(idblog);
      if (isnum == false) {   
        alert("ID blog ne doit pas comporter une Lettre");
        verif = 0;
        return false;
      } else verif = 1;


    if (verif == 1) {  
      return true;
    }
  }


</script>
<?php
include 'footer.php';

?>