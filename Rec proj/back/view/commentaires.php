<?php
include_once 'header.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../controller/commentaire.php';

if (isset($_GET["id"])){

$commentaire=new commentaireA();
$commentaire=$commentaire->affichercommentaireback($_GET["id"]); 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Commentaires</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Commentaires</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Gestion des Commentaires</h3>
              </div>
              <div class="col-md-6" style="margin-top: 10px;margin-left: 13px;margin-bottom: -5px;">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
			<tr>
				<th>Id</th>
				<th>Id Blog</th>
				<th>Commentaire</th>
				<th>Nom</th>
				<th>Date</th>
				<th>Email</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
      <?php
        $ress = $commentaire->fetchAll();
        if (empty($ress)){
			?>
      <td colspan="8">
        <div class="alert alert-danger" role="alert">
          Pas de Commentaires </br> Article num: <?php echo $_GET["id"]; ?>
        </div>
      </td>
      
			<?php
        }
				foreach($ress as $comment){
			?>
			<tr>
				<td><?php echo $comment['id']; ?></td>
				<td><?php echo $comment['id_blog']; ?></td>
				<td><?php echo $comment['commentaire']; ?></td>
				<td><?php echo $comment['nom']; ?></td>
				<td><?php echo $comment['date']; ?></td>
				<td><?php echo $comment['email']; ?></td>
				<td>
					<form method="POST" action="modifiercommentaire.php">
          <button type="submit" name="Modifier" class="btn btn-primary">Modifier</button>
						<input type="hidden" value=<?PHP echo $comment['id']; ?> name="id">
            <input type="hidden" value=<?PHP echo $comment['id_blog']; ?> name="id_blog">
					</form>
				</td>
				<td>
        <button name="Modifier" class="btn btn-primary"><a style="color:white;" href="supprimercommentaire.php?id=<?php echo $comment['id']; ?>">Supprimer</a></button>

				</td>
			</tr>
      
			<?php
				}
			?>
      
		    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
            </div>
        <?php
}else{
  echo '<script>window.location.replace("gestionblog.php");</script>';

}

include_once 'footer.php';
?>