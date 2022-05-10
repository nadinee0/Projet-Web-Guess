<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("function.php");

// get reclamation
$query = "SELECT * FROM reclamation";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$reclamation = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $reclamation[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=reclamation.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ref', 'nom', 'email','type','description','status', 'idUser'));

if (count($reclamation) > 0) {
    foreach ($reclamation as $row) {
        fputcsv($output, $row);
    }
}
?>
