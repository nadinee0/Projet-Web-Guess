<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/proj/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/proj/model/commentaire.php';
	class commentaireA {
		function affichercommentaireback($id){
			$sql="SELECT * FROM commentaire where id_blog=".$id;
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
        
		function supprimercommentaire($id){
			$sql="DELETE FROM commentaire WHERE id=:id";
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
		
		function recuperercommentaire($id){
			$sql="SELECT * from commentaire where id=$id";
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
	
		
		function modifiercommentaire($comment, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE commentaire SET 
						id_blog= :id_blog, 
						commentaire= :commentaire, 
						email= :email, 
						nom= :nom, 
						date= :date
					WHERE id= :id'
				);
                $date = $comment->getdate();
                $date=date("Y-m-d",strtotime($date));
				$query->execute([
					'id_blog' => $comment->getid_blog(),
					'commentaire' => $comment->getcommentaire(),
					'email' => $comment->getemail(),
					'nom' => $comment->getnom(),
					'date' => $date,
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function ajoutercommentaire($blog){
			$sql="INSERT INTO commentaire (id_blog, commentaire, email, nom) 
			VALUES (:id_blog, :commentaire, :email, :nom)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_blog' => $blog->getid_blog(),
					'commentaire' => $blog->getcommentaire(),
					'email' => $blog->getemail(),
					'nom' => $blog->getnom()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}		 
		}
		function recuperercomment($id){
			$sql="SELECT commentaire.commentaire,commentaire.nom,commentaire.date,commentaire.email FROM blog LEFT JOIN commentaire ON blog.id = commentaire.id_blog where blog.id=$id";
			$sql2="SELECT COUNT(*) as `count` FROM commentaire where id_blog=$id";
			$db = config::getConnexion();
			try{
				$liste['comment'] = $db->query($sql);
				$liste['count'] = $db->query($sql2);
				$liste['count']= $liste['count']->fetch();
				return $liste;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}		 
		}

	}
?>