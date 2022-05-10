<?php


  class config {
    private static $pdo = NULL;   

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=guess', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }   
  }

	class reclamationC
	{
		
		function ajouter($reclamation){
			$db = config::getConnexion();
			$sql = "INSERT INTO reclamation (?,?,?,?,?,?,?,?) VALUES (:id,:nom,:ref,:email,:type,:description:status,idUser)";
			try {
				$req = $db->prepare($sql);
			$req->bindValue(':id',$reclamation->getId());
            $req->bindValue(':nom',$reclamation->getnom());
            $req->bindValue(':ref',$reclamation->getRef());
            $req->bindValue(':email',$reclamation->getemail());
			$req->bindValue(':type',$reclamation->gettype());
			$req->bindValue(':descriptions',$reclamation->getdescriptions());
			$req->bindValue(':status',$reclamation->getstatus());
			$req->bindValue(':idUser',$reclamation->getidUser());
			
	
			$req->execute();
		}
		catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			

		}
		function afficherreclamation(){
			$db = config::getConnexion();
			$sql="SELECT * FROM reclamation ";
			$liste=$db->query($sql);
			return $liste;
			
		}

		function modifierreclamation($reclamation,$id){
			$db = config::getConnexion();
			
			$sql="UPDATE reclamation SET nom=:nom,ref=:ref,email=:email, type=:type, description=:description, status=:status, idUser=:idUser WHERE id=:id";
			try{
				$req=$db->prepare($sql);
				
            $req->bindValue(':nom',$reclamation->getnom());
            $req->bindValue(':ref',$reclamation->getRef());
            $req->bindValue(':email',$reclamation->getemail());
			$req->bindValue(':type',$reclamation->gettype());
			$req->bindValue(':description',$reclamation->getdescription());
			$req->bindValue(':status',$reclamation->getstatus());
			$req->bindValue(':idUser',$reclamation->getIdUser());

				$req->bindValue(':id',$id);
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}
		
		function supprimerreclamation($id){
			$db = config::getConnexion();
			$sql="DELETE FROM reclamation where id= :id";
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
	        $req->execute();
	        
		}

		function reccupererreclamation($id){
			$db = config::getConnexion();
			$sql="SELECT * from reclamation where id=$id";
			$liste=$db->query($sql);
			return $liste;
		}

		function HistoriqueRclamation($id){
			$db = config::getConnexion();
		    
			$sql="SELECT * from reclamation where idUser= $idUser";
			$liste=$db->query($sql);
			return $liste;
		}

	
		
		
	}

  ?>