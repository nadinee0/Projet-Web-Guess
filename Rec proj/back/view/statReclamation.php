<?php  

include_once "C:/xampp/htdocs/Atelierphp/integration/back/view/header.php";

     $dbhandle = new mysqli('127.0.0.1', 'root', '','guess');
     echo $dbhandle->connect_error;
     
     $query = "select type, count(type) from reclamation GROUP BY type";
     
     $res = 	$dbhandle->query($query);
     
     ?>


  



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      
  
      
            <h1>
            STAT   Reclamation
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
        <div class="body">
                        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
		
          ['type','type'],
         <?php
		 
		 //fetch_assoc(): lit une ligne de résultat MySql dans un tableau associatif //
		 
		 while ($row=$res->fetch_assoc()) {
			 
			 echo "['".$row['type']."',".$row['count(type)']."],"; 
			 
		 }
		 
		 ?>
        ]);

        var options = {
          title: 'Reclmation | Type',
		  is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>

 
    <div id="piechart" style="width: 800px; height: 500px;"></div>

 </div>
               
                </div>
             
         
            
          </div>
        </div>
                        </div>
                    </div>
                </div>
            </div>
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
