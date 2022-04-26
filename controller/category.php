<?php
    include $_SERVER["DOCUMENT_ROOT"].'/proj/config.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/proj/model/category.php';
 
    class categoryA {
        function affichercategoryback(){
            $sql="SELECT * FROM category";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        function affichercategory(){
			$sql="SELECT * FROM category";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function supprimercategory($id){
            $sql="DELETE FROM category WHERE id=:id";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':id', $id);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        function ajoutercategory($category){
            $sql="INSERT INTO category (nom) 
            VALUES (:nom)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                $query->execute([
                    'nom' => $category->getnom(),
                 
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        function recuperercategory($id){
            $sql="SELECT * from category where id=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $category=$query->fetch();
                return $category;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        function modifiercategory($category, $id){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE category SET 
                        nom= :nom
                        
                    WHERE id= :id'
                );
                $query->execute([
                    'nom' => $category->getnom(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

    }
?>