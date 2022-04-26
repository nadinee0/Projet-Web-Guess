<?php

    include_once "../../../../Controller/categorieC.php";
    include_once "../../../../Model/categorie.php";

    function pdo_connect_mysql() {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'rec';
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
   
        if (!empty($_POST)) {
            $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $subCat = isset($_POST['subCat']) ? $_POST['subCat'] : '';
            $idReclamation = isset($_POST['idReclamation']) ? $_POST['idReclamation'] : '';
           
            if($nom != "" && $subCat != "" && $idReclamation != ""){ // si les saisies ne sont pas vides
               
            }else { echo "champs vide !";}
            
            
            $stmt = $pdo->prepare('INSERT INTO categorie VALUES (?, ?, ?, ?)');
            $stmt->execute([$id, $nom, $subCat, $idReclamation]);
            // Output message
            $msg = 'Created Successfully!';
        }


    
?>
 