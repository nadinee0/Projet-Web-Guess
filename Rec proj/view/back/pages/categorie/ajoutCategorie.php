<?php  
 
     include_once "../layout/Header.php";

  

 /* 
  else if(isset($_POST['supprimer'])){
   
    $produitC->supprimerproduit($_POST['reference']);
    header('location: list_produits.php');
  }*/
  

  ?>
  



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categorie</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">list categorie</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <br>
              <form action="ajoutCategorieAction.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">sub Categorie</label>
                                        <input type="text" class="form-control" id="subCat" name="subCat"  required>
                                       
                                    </div>

                                </div>
                               
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">nom</label>
                                        <input type="text" class="form-control"id="nom" name="nom" required>
                                       
                                    </div>
                                    
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Reclamation</label>
                                        <input type="number" class="form-control" id="idReclamation" name="idReclamation" required>
                                        
                                    </div>
                                   
                                </div>
                              
                            
                                
                                <button class="btn btn-success waves-effect" type="submit">Valider</button>
                                <button class="btn btn-danger waves-effect" type="reset">Annuler</button>
                            </form>
            </div>
            <!-- /.card -->

        

          
      
          </div>
          <!--/.col (left) -->
   
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>


