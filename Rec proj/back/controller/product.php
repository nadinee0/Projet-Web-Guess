<?php
$filepath = realpath(dirname(__FILE__));
include_once  $filepath.'/../../config.php';
include_once $filepath.'/../model/product.php';
 
    class productA {
        function afficherproductback(){
            $sql="SELECT * FROM produits";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        function afficherproduct(){
			$sql="SELECT * FROM produits";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function supprimerproduct($ID){
            $sql="DELETE FROM produits WHERE ID=:ID";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':ID', $ID);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        function ajouterproduct($product){
            $sql="INSERT INTO produits ( description, prix, quantite, titre,category) 
            VALUES (:description,:prix, :quantite,:titre,:category)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                $query->execute([
                    'description' => $product->getdescription(),
                    'prix' => $product->getprix(),
                    'quantite' => $product->getquantite(),
                    'titre' => $product->gettitre(),
                    'category' => $product->getcategory()

                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        function recupererproduct($ID){
            $sql="SELECT * from produits where ID=$ID";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $product=$query->fetch();
                return $product;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        function modifierproduct($product, $ID){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE produits SET 
                       
                        description= :description, 
                        prix= :prix, 
                        quantite= :quantite, 
                        titre= :titre,
                        category= :category

                    WHERE ID= :ID'
                );
                $query->execute([
                    'description' => $product->getdescription(),
                    'prix' => $product->getprix(),
                    'quantite' => $product->getquantite(),
                    'titre' => $product->gettitre(),
                    'category' => $product->getcategory(),
                   
                    'ID' => $ID
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

    }
?>