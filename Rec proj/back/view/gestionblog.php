<?php
$filepath = realpath(dirname(__FILE__));
include_once 'header.php';
//include '../../config.php';
include_once $filepath.'/../controller/blog.php';

$bloga=new blogA();
$listeblog=$bloga->afficherblogback(); 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion de blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gestion de blog</li>
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
                <h3 class="card-title">Gestion des articles et commentaires</h3>
              </div>
              <div class="col-md-6" style="margin-top: 10px;margin-left: 13px;margin-bottom: -5px;">
              <button class="btn btn-primary"><a href="ajouterblog.php" style="color:white;">Ajouter</a></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
			<tr>
				<th>Id</th>
				<th>Titre</th>
				<th>Contenu</th>
				<th>Categorie</th>
				<th>Date</th>
				<th>Jaime</th>
        <th>Commentaires</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeblog as $article){
			?>
			<tr>
				<td><?php echo $article['id']; ?></td>
				<td><?php echo $article['titre']; ?></td>
				<td><?php echo $article['contenu']; ?></td>
				<td><?php echo $article['categorie']; ?></td>
				<td><?php echo $article['date']; ?></td>
				<td><?php echo $article['jaime']; ?></td>
        <td>
        <button name="Modifier" class="btn btn-primary"><a style="color:white;" href="commentaires.php?id=<?php echo $article['id']; ?>">Commentaires</a></button>
				</td>
				<td>
					<form method="POST" action="modifierblog.php">
          <button type="submit" name="Modifier" class="btn btn-primary">Modifier</button>
						<input type="hidden" value=<?PHP echo $article['id']; ?> name="idblog">
					</form>
				</td>
				<td>
        <button name="Modifier" class="btn btn-primary"><a style="color:white;" href="supprimerblog.php?id=<?php echo $article['id']; ?>">Supprimer</a></button>
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
include 'footer.php';
?>