<?php
    include $_SERVER["DOCUMENT_ROOT"].'/proj/config.php';
    include_once $_SERVER["DOCUMENT_ROOT"].'/proj/model/coupon.php';
    class couponA {
        function affichercouponback(){
            $sql="SELECT * FROM coupon";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }
        
        function supprimercoupon($id){
            $sql="DELETE FROM coupon WHERE id=:id";
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
        function ajoutercoupon($coupon){
            $sql="INSERT INTO coupon ( coupon, pourcentage) 
            VALUES (:coupon,:pourcentage )";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                $query->execute([
                    'coupon' => $coupon->getcoupon(),
                    'pourcentage' => $coupon->getpourcentage(),
                    

                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        function recuperercoupon($id){
            $sql="SELECT * from coupon where id=$id";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $coupon=$query->fetch();
                return $coupon;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function getcoupon($value){
            $sql="SELECT * from coupon where coupon='".$value."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $coupon=$query->fetch();
                return $coupon;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        function modifiercoupon($coupon, $id){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE coupon SET 
                        coupon= :coupon, 
                        pourcentage= :pourcentage
                        
                    WHERE id= :id'
                );
                $query->execute([
                    'pourcentage' => $coupon->getpourcentage(),
                    'coupon' => $coupon->getcoupon(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
                
            }
        }

    }
?>