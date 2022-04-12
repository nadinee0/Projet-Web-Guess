   <?php
	include  $_SERVER['DOCUMENT_ROOT'].'/proj/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/proj/model/utilisateur.php';
	class utilisateurC {
		function afficherUtilisateurs(){
			$sql="SELECT * FROM utilisateur";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


   function connecterUtilisateur($email,$password)
   {
       $db = config::getConnexion();
       $sql=$db->prepare("SELECT * FROM utilisateur where email ='$email' and password ='$password'");

       try
       {
           $sql->execute();
           $resultat=$sql->fetch();
           return $resultat;
       }
       catch (Exception $e)
       {
           die('Erreur: '.$e->getMessage());
       }
   }
   function ajouterUtilisateur($Utilisateur){

    $nom=$Utilisateur->getNom();
    $prenom=$Utilisateur->getPrenom();
    $naissance=$Utilisateur->getNaissance();
    $email=$Utilisateur->getEmail();
    $password=$Utilisateur->getPassword();
    $type=$Utilisateur->getType();

    $sql="INSERT INTO utilisateur (nom,prenom,naissance,email,password,type) VALUES ('$nom','$prenom','$naissance','$email','$password','$type')";

    $db = config::getConnexion();
    try
    {
        $db->query($sql);
    }
    catch (Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }
}
function recupererUtilisateur($id){
    $sql="SELECT * from utilisateur where id=$id";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();

        $Utilisateur=$query->fetch();
        return $Utilisateur;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

   function afficherUtilisateur($id)
   {

       $sql="SELECT * FROM utilisateur where id ='$id'";

       $db = config::getConnexion();
       try
       {
           $list=$db->query($sql);
           return $list;
       }
       catch (Exception $e)
       {
           die('Erreur: '.$e->getMessage());
       }
   }
   function modifierUtilisateur($id,$nom, $prenom, $naissance, $email, $password, $type){
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                id= :id, 
                nom= :nom, 
                prenom= :prenom, 
                naissance= :naissance, 
                email= :email,
                password= :password,
                type =:type

            WHERE id= :id'
        );
        $query->execute([
            'id' => $id ,
            'nom' => $Utilisateur->getnom(),
            'prenom' => $Utilisateur->getprenom(),
            'naissance' => $Utilisateur->getnaissance(),
            'email' => $Utilisateur->getemail(),
            'passwrod' => $Utilisateur->getpassword(),
            'type' => $Utilisateur->getype(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
   function supprimerUtilisateur($id)
   {
    $sql="DELETE FROM utilisateur where id=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
    try{
        $req->execute();
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
}
