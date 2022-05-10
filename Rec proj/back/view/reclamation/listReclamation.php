<?php  
     include_once "C:/xampp/htdocs/Atelierphp/integration/back/controller/reclamationC.php";
     include_once "C:/xampp/htdocs/Atelierphp/integration/back/model/reclamation.php";
     include_once "C:/xampp/htdocs/Atelierphp/integration/back/view/header.php";

  

  $reclamationC=new reclamationC();
  $listereclamation=$reclamationC->afficherReclamation();

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
          <script>
        function Export()
        {
            var conf = confirm("Export  to CSV?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
         
         <script type="text/javascript">
            function imprimer_page(){
            window.print();
             }
        </script>
         <PHP header('Expires: 0');
          header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
          header('Pragma: public');
          ?>
            <h1>
              Reclamation
            </h1>
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
        <label>Recherche:<input id="myInput"  type="text"name="rechercher" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_1"></label></div>
          <!-- left column -->
          <div class="container">
          <button  id="impression" name="impression" onclick="imprimer_page()" type="button" class="btn bg-green waves-effect">
                                    <i class="material-icons">print</i>
                                    <span>PRINT...</span>
                                </button>
                                <button type="button"  onclick="Export()"class="btn bg-blue waves-effect">
                                    <i class="material-icons">report_problem</i>
                                    <span>Export to csv</span>
                                </button>
      <br>
      <br>
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List Reclamation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <br>
              <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        <th>Reference</th>
                                        <th>Nom</th>
                                          
                                            <th>email</th>
                                            <th>type</th>
                                            <th>status</th>
                                            <th>user</th>
                                            
                                            <th> action </th>
                                            
                                        </tr>
                          

                                    </thead>
                                    
                                    <tbody id="myTable">
                                                 
                                        <?php      foreach ($listereclamation as $row) {?>
                            <tr class="tr-shadow">
                               
                            <td>
                                <?php echo $row['ref']; ?>
                                </td>
                                <td>
                                <?php $str =  $row['nom'];
                                 echo strtoupper ($str);?>
                                </td>
                              
                                
                                <td ><?PHP echo $row['email']; ?></td>
                                <td ><?PHP echo $row['type']; ?></td>
                                <td ><?PHP echo $row['status']; ?></td>
                                <td ><?PHP echo $row['idUser']; ?></td>
                               
                                <td>
                                  
                                <form
                                  method="POST" action="supprimerReclamation.php">
                                  <button type="submit"  name="supprimer"  class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float">
                                    <i class="material-icons">supprimer</i>
                                </button>
                     
                        <input type="hidden" value=<?PHP echo $row['id']; ?> name="id">
                       
                        <a href="modifierReclamation.php?id=<?PHP echo $row['id']; ?>" >
                        <button type="button" class="btn btn-primary btn-circle-lg waves-effect waves-circle waves-float">          
                        <i class="material-icons">modifier</i>
                                </button>
                                </a>
                    </td>
                            
                                                    </td>
                                                    <tr class="spacer"></tr>
                                                   
                                                </tr>
                                            
                                     
                                                <?php
                          }
                          ?>
                                      
                                      
                                    </tbody>
                                </table>
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
