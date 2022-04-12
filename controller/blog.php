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
		function ajouterblog($blog){
			$sql="INSERT INTO blog (titre, contenu, categorie, date, jaime) 
			VALUES (:titre,:contenu,:categorie, :date,:jaime)";
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
					'jaime' => $blog->getjaime()
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
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	
		

	}
?>