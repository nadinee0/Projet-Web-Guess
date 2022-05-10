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
    
	class categorieC
	{
		
		function afficher(){
			$db = config::getConnexion();
			$sql = "SELECT * FROM categorie ";
			$liste = $db->query($sql);
			return $liste;
		}

		function ajouter($categorie){
			$db = config::getConnexion();
			$sql = "INSERT INTO categrie VALUES(:subCat,:nom, :idReclamation)";
			$req = $db->prepare($sql);
			$req->bindValue(':subCat',$categorie->getSubCat());
			$req->bindValue(':nom',$categorie->getNom());
            $req->bindValue(':subCat',$categorie->getSubCat());
			$req->execute();
		}

        function modifiercategorie($categorie,$id){
			$db = config::getConnexion();
			
			$sql="UPDATE categorie SET nom=:nom,subCat=:subCat,idReclamation=:idReclamation WHERE id=:id";
			try{
				$req=$db->prepare($sql);
				
            $req->bindValue(':nom',$categorie->getnom());
            $req->bindValue(':subCat',$categorie->getSubCat());
            $req->bindValue(':idReclamation',$categorie->getidReclamation());

				$req->bindValue(':id',$id);
				$s=$req->execute();
			}
			catch(Exception $e){
				echo("Erreur".$e->getMessage());
			}

		}

		function recuperer($nom){
			$db = config::getConnexion();
			$sql = "SELECT * FROM categorie WHERE nom=:nom";
			$req=$db->prepare($sql);
			$req->bindValue(':nom',$nom);
			return $req;
		}
        function supprimercategorie($id){
			$db = config::getConnexion();
			$sql="DELETE FROM categorie where id= :id";
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
	        $req->execute();
	        
		}
		
	}


?>
