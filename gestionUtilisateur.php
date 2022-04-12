<?php
include 'header.php';
//include '../../config.php';
include '../../controller/utilisateurC.php';
$user=new utilisateurC();
$listeU=$user->afficherUtilisateurs(); 
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
			<tr>
			<th>id</th>
				<th>nom</th>
				<th>prenom</th>
				<th>naissance</th>
				<th>email</th>
				<th>password</th>
				<th>type</th>
                <th>modifier</th>
                <th>supprimer</th>
			</tr>
			<?php
				foreach($listeU as $client){
			?>
			<tr>
				<td><?php echo $client['id']; ?></td>
				<td><?php echo $client['nom']; ?></td>
				<td><?php echo $client['prenom']; ?></td>
				<td><?php echo $client['naissance']; ?></td>
				<td><?php echo $client['email']; ?></td>
				<td><?php echo $client['password']; ?></td>
        <td><?php echo $client['type']; ?></td>
        

				<td>
					<form method="POST" action="modifierUtilisateur.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $client['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerutilisateur.php?id=<?php echo $client['id']; ?>">Supprimer</a>
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