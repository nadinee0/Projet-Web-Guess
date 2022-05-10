<?php  
     include_once "C:/xampp/htdocs/Atelierphp/integration/front/controller/reclamationC.php";
     include_once "C:/xampp/htdocs/Atelierphp/integration/front/model/reclamation.php";
    // C:\xampp\htdocs\Atelierphp\integration\front\controller\reclamationC.php
    //C:\xampp\htdocs\Atelierphp\integration\front\model\reclamation.php
  $reclamationC=new reclamationC();
  
  $HistoriqueRec=$reclamationC->afficherreclamation();

?>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container"></div>
    <header>
        <h1> Reclamation </h1>
    </header>
   
    <main>
    <div class="form_div">
    <table class="form_class">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Reference</th>
                                            <th>description</th>
                                         
                                            <th>status</th>
                                
                                        </tr>
                                    </thead>                                    
                                    <tbody id="myTable">
                                                 
                                        <?php      foreach ($HistoriqueRec as $row) {?>
                            <tr class="tr-shadow">
                               
                               
                                <td>
                                <?php echo $row['ref']; ?>
                                </td>
                                <td>
                                <?php $str =  $row['nom'];
                                 echo strtoupper ($str);?>
                                </td>
                                <td ><?PHP echo $row['description'];
                                 ?></td>
                            
                                <td ><?PHP echo $row['status'];
                                 ?></td>

                                                    </td>
                                                    <tr class="spacer"></tr>
                                                   
                                        </tr>
                                                <?php
                          }
                          ?>
                                                                            
                                    </tbody>
                                </table>
                        </div>
    </main>
    <footer>
     
    </footer>
 
</body>
</html>