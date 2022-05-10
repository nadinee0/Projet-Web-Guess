<?php
    include_once $_SERVER["DOCUMENT_ROOT"].'/proj/config.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/proj/model/promotion.php';
    class promotionA {
        function afficherpromotionback(){
            $sql="SELECT * FROM promotion";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        function searchpromotion($value){
			$sql="SELECT * from promotion where pourcentage like '%".$value."%'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
        function supprimerpromotion($id){
            $sql="DELETE FROM promotion WHERE id=:id";
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
        function ajouterpromotion($promotion){
            $sql="INSERT INTO promotion ( pourcentage, duree, id_prod) 
            VALUES (:pourcentage,:duree,:id_prod )";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                $query->execute([
                    'pourcentage' => $promotion->getPourcentage(),
                    'duree' => $promotion->getDuree(),
                    'id_prod' => $promotion->getidprod()
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        function recupererpromotion($id){
            $sql="SELECT * from promotion where id=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $promotion=$query->fetch();
                return $promotion;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function verifierpromo($id_prod){
            $sql="SELECT * from promotion where id_prod=$id_prod";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $promotion=$query->fetch();
                return $promotion;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        function modifierpromotion($promotion, $id){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE promotion SET 
                        pourcentage= :pourcentage, 
                        duree= :duree,
                        id_prod= :id_prod
                    WHERE id= :id'
                );
                $query->execute([
                    'duree' => $promotion->getDuree(),
                    'pourcentage' => $promotion->getPourcentage(),
                    'id_prod' => $promotion->getidprod(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
                
            }
        }

    }
?>