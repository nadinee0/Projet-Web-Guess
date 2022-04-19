<?PHP

include "C:\\xampp\\htdocs\\proj\\model\\cart.php";
//include "C:/xampp/htdocs/proj/model/product.php";

class cartC
{
function affichepanier ($panier)
    {
		echo "id_Produit: ".$panier->getid_Produit()."<br>";
		echo "Nom_produit: ".$panier->getNom_produit()."<br>";
		echo " Prix: ".$panier->getPrix()."<br>";
        echo "quantite: ".$panier->getQuantite()."<br>";
        echo "total: ".$panier->getTotal()."<br>";
        echo "id_Panier: ".$panier->getid_Panier()."<br>";

    }
    function afficher($var){

        $query = "SELECT * FROM cart LIMIT $var,6";

        $db = config::getConnexion();
        try{

            return ( $db->query($query));
        }
        catch (Exception $err){
            echo 'Erreur: '.$err->getMessage();

        }

    }
	
	function ajouterpanier($panier){
		$sql="insert into cart (id_panier,nom_produit,prix,quantite,total,id_Produit) values (:id_panier, :nom_produit, :prix, :quantite, :total, :id_Produit)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $id_Produit=$panier->getid_Produit();
        $nom_produit=$panier->getNom_produit();
        $total=$panier->getTotal();
        $prix=$panier->getPrix();
        $id_panier=$panier->getid_panier();
        $quantite=$panier->getQuantite();
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':nom_produit',$nom_produit);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
        $req->bindValue(':total',$total);
        $req->bindValue(':id_Produit',$id_Produit);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
    function afficherpaniers()
    {
		$sql="SElECT * From cart";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    
    function supprimerpanier($id_panier)
    {
		$sql="DELETE FROM cart where id_panier= :id_panier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_panier',$id_panier);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
	function modifierpanier($panier,$id_Panier){
		$sql="UPDATE cart SET id_panier=:id_panier, nom_produit=:nom_produit, prix=:prix, Prix=:Prix, quantite=:quantite, total=:total, id_Produit=:id_Produit WHERE id_Produit=:id_Produit";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $id_Produit=$panier->getid_Produit();
        $nom_produit=$panier->getNom_produit();
        $total=$panier->getTotal();
        $prix=$panier->getPrix();
        $id_panier=$panier->getid_panier();
        $quantite=$panier->getQuantite();
        $datas = array(':id_panier'=>$id_panier, ':nom_produit'=>$nom_produit, ':prix'=>$prix, ':quantite'=>$quantite, ':total'=>$total,':id_Produit'=>$id_Produit);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':nom_produit',$nom_produit);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':quantite',$quantite);
        $req->bindValue(':total',$total);
        $req->bindValue(':id_Produit',$id_Produit);
		
		

        
		
		
            $s=$req->execute();
			

        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
    }
	
    function rechercherlistepanier($id_Panier)
    {
		$sql="SELECT * from cart where id_Produit=$id_Produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function somme()
    {
        $sql="SELECT SUM(Prix) AS total FROM cart ";
        $db = config::getConnexion();
        try{
        $liste= $db->query($sql);
        $row = $liste->fetch_assoc(); 
        $sum = $row['total'];
        return $sum;
		}
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
        }
    }

    function recupererpanier($id_Panier)
    {
		$sql="SELECT * from cart where id_panier=$id_Panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

/*
    function createNewCartWithRows($commandes){
		$sql="INSERT INTO panier (mail) VALUES('$mail')";
		$db = config::getConnexion();
		try{
        $db->query($sql);
        foreach($commandes as $order){
            $idc=$order['id_commande'];
            $cartId=$db->lastInsertId();
            $price=$order['prix'];
            $sql2="INSERT INTO commande_pannier (id_commande,id_panier,prix) VALUES('$idc','$cartId','$price')";
            try {
                $db->query($sql2);
            }
 
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
            
        }
        return "done";

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }


    }
    public function modifierEtat($Etat,$id_Panier)
	{
		$sql="UPDATE panier SET Etat=:Etat WHERE id_Panier=:id_Panier";
			$db=config::getConnexion();
			try{
			$req=$db->prepare($sql);
			
			$req->bindValue(':id_Panier',$id_Panier);
			$req->bindValue(':Etat',$Etat);
			$req->execute();
		}
		catch (Exception $e)
        {
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}

    function tridate()
    {
        $sql= "SELECT * from panier ORDER BY Date_Commande";
        $db= config::getConnexion();
        try{
            $liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    */
    
}



?>