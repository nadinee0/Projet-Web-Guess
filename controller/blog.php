<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/proj/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/proj/model/blog.php';
	class blogA {
		function afficherblogback(){
			$sql="SELECT * FROM blog";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        function afficherblog(){
			$sql="SELECT * FROM blog";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerblog($id){
			$sql="DELETE FROM blog WHERE id=:id";
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
		function ajouterblog($blog,$img){
			$sql="INSERT INTO blog (titre, contenu, categorie, date, jaime,img) 
			VALUES (:titre,:contenu,:categorie, :date,:jaime,:img)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $date = $blog->getdate();
                $date=date("Y-m-d",strtotime($date));
				$query->execute([
					'titre' => $blog->gettitre(),
					'contenu' => $blog->getcontenu(),
					'categorie' => $blog->getcategorie(),
					'date' => $date,
					'jaime' => $blog->getjaime(),
					'img' => $img
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}		 
		}
		function recupererblog($id){
			$sql="SELECT * from blog where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$blog=$query->fetch();
				return $blog;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function searchblog($value){
			$sql="SELECT * from blog where titre like '%".$value."%'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
	
		
		function modifierblog($blog, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE blog SET 
						date= :date, 
						titre= :titre, 
						contenu= :contenu, 
						categorie= :categorie, 
						jaime= :jaime
					WHERE id= :id'
				);
				$query->execute([
					'titre' => $blog->gettitre(),
					'contenu' => $blog->getcontenu(),
					'categorie' => $blog->getcategorie(),
					'jaime' => $blog->getjaime(),
					'date' => $blog->getdate(),
					'id' => $id
				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function getlikes($id)
		{
		  global $conn;
		  $rating = array();
		  $sql = "SELECT jaime FROM blog WHERE id = $id";
		  $db = config::getConnexion();
		  try{
			$query=$db->prepare($sql);
			$query->execute();

			$blog=$query->fetch();
			$rating = [
				'likes' => $blog['jaime']
			];
			return json_encode($rating);
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}


		}		
	
		

	}
?>