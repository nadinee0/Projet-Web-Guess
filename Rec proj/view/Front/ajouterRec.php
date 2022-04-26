<?php 
    // 
    $sql="SELECT* FROM `reclamation`;";
    /*include_once "C:/xampp/htdocs/Atelierphp/proj/proj/controller/reclamationC.php";
    include_once "C:/xampp/htdocs/Atelierphp/proj/proj/model/reclamation.php";
    */
    if(isset($_POST['nom'])){

        $reclamation1 = new Reclamation($_POST['ref'],$_POST['nom'],$_POST['email']);
       
        $reclamationG=new ReclamationC();
        $reclamationG->ajouterrec($reclamation1);
        
        $reclamationG->afficherReclamation($reclamation1);
     

       
    }
    else {
        echo "verifier les champs";
    }
        ?>


