<?php

    include_once "../../../Controller/reclamationC.php";
    include_once "../../../Model/reclamation.php";

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
    // Check if the reclamation id exists, for example update.php?id=1 will get the reclamation with the id of 1
   
        if (!empty($_POST)) {
            $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
            $ref = isset($_POST['ref']) ? $_POST['ref'] : '';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            if ( preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $email ) )  
            {
            
            }
            else{
                echo "addr mail n'est pas valide ";
            }
            if($nom != ""  && $email != "" && $ref != ""){ // si les saisies ne sont pas vides
               
            }else { echo "champs vide !";}
            
            
            $stmt = $pdo->prepare('INSERT INTO reclamation VALUES (?, ?, ?, ?)');
            $stmt->execute([$id, $nom, $ref, $email]);
            // Output message
            $msg = 'Created Successfully!';
        }


    
?>
 