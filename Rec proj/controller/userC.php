<?php


  class config {
    private static $pdo = NULL;   

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=rec', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }   
  }

	class userC
	{
		
		function ajouter($user){
			$db = config::getConnexion();
			$sql = "INSERT INTO user (?,?,?,?,?) VALUES (:id,:nom,:prenom,:telephone,:idReclamation)";
			try {
				$req = $db->prepare($sql);
			$req->bindValue(':id',$user->getId());
            $req->bindValue(':nom',$user->getnom());
            $req->bindValue(':prenom',$user->getprenom());
            $req->bindValue(':telephone',$user->gettelephone());
			$req->bindValue(':idReclamation',$user->getidReclamation());

			
	
			$req->execute();
		}
		catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			

		}
		function afficheruser(){
			$db = config::getConnexion();
			$sql="SELECT * FROM user ";
			$liste=$db->query($sql);
			return $liste;
			
		}

		function modifieruser($user,$id){
			$db = config::getConnexion();
			
			$sql="UPDATE user SET nom=:nom,prenom=:prenom,telephone=:telephone, idReclamation=:idReclamation WHERE id=:id";
			try{
				$req=$db->prepare($sql);
				
            $req->bindValue(':nom',$user->getnom());
            $req->bindValue(':prenom',$user->getprenom());
            $req->bindValue(':telephone',$user->gettelephone());
			$req->bindValue(':idReclamation',$user->getidReclamation());
			$req->bindValue(':status',$user->getstatus());

				$req->bindValue(':id',$id);
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}
		
		function supprimeruser($id){
			$db = config::getConnexion();
			$sql="DELETE FROM user where id= :id";
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
	        $req->execute();
	        
		}

		function reccupereruser($id){
			$db = config::getConnexion();
			$sql="SELECT * from user where id=$id";
			$liste=$db->query($sql);
			return $liste;
		}

		function reccupereruserUser($id){
			$db = config::getConnexion();
			$sql="SELECT * from user where id= 1";
			$liste=$db->query($sql);
			return $liste;
		}

	
		
		
	}

  ?>