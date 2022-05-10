<?php
include '../controller/blog.php';
$blogC = new blogA();
$db = config::getConnexion();

if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
        $query = $db->prepare('UPDATE blog SET jaime= jaime+1 WHERE id= :id');
        break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  $query->execute(['id' => $post_id]);
  echo $blogC->getlikes($post_id);
  exit(0);
}




?>
