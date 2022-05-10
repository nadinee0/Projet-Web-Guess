<?php

include_once "C:/xampp/htdocs/Atelierphp/integration/back/controller/categorieC.php";
include_once "C:/xampp/htdocs/Atelierphp/integration/back/model/categorie.php";


    function pdo_connect_mysql() {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'guess';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    $msg = '';
    $pdo = pdo_connect_mysql();
    // Check if the categorie id exists, for example update.php?id=1 will get the categorie with the id of 1
    if (isset($_GET['id'])) {
        if (!empty($_POST)) {
            // This part is similar to the create.php, but instead we update a record and not insert
          //  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $subCat = isset($_POST['subCat']) ? $_POST['subCat'] : '';
            $idReclamation = isset($_POST['idReclamation']) ? $_POST['idReclamation'] : '';
          
            if($nom != "" && $subCat != "" && $idReclamation != ""){ // si les saisies ne sont pas vides
               
            }else { echo "champs vide !";}
            
            // Update the record
            $stmt = $pdo->prepare('UPDATE categorie SET  nom = ?, subCat = ?, idReclamation = ? WHERE id = ?');
            $stmt->execute([ $nom, $subCat, $idReclamation, $_GET['id']]);
            $msg = 'Updated Successfully!';
        }
        // Get the categorie from the categories table
     $stmt = $pdo->prepare('SELECT * FROM categorie WHERE id = ?');
       $stmt->execute([$_GET['id']]);
      $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$categorie) {
           exit('categorie doesn\'t exist with that id!');
        }
    } 
    else {
        exit('No id specified!');
    }
    
    ?>