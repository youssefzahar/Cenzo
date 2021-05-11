<?php 
include "../config.php";
class MenuC{


    
public function afficherMenus(){
    $sql="SELECT * From menu";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}


public function ajouterMenu($Menu){
    $sql="insert into Menu(nom_plat,prix_plat) values(:nom_plat,:prix_plat)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $nom_plat=$Menu->getNom_plat();
        $prix_plat=$Menu->getPrix_plat();
       
        $req->bindValue(':nom_plat',$nom_plat);
        $req->bindValue(':prix_plat',$prix_plat);
       
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}




        function recupererMenu($id){
        $sql="SELECT * from menu where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



            //chya3mel update lil immage ama fil asel yajouti fil path
    function ajouterMenuimg($nom_plat,$image_plat){
        $sql="UPDATE menu SET image_plat=:image_plat WHERE nom_plat=:nom_plat";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':nom_plat',$nom_plat);
        $req->bindValue(':image_plat',$image_plat);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }

    function ajouterMenuAddedon($nom_plat){
        $sql="UPDATE menu SET Added_on=now() WHERE nom_plat=:nom_plat";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':nom_plat',$nom_plat);

        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }





public function supprimerMenu($id){
    $sql="DELETE FROM menu where id=:id";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}


       function modifierMenu($menu,$id){
        $sql="UPDATE menu SET nom_plat=:nom_plat,prix_plat=:prix_plat WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $nom_plat=$menu->getNom_plat();
        $prix_plat=$menu->getPrix_plat();
        $datas = array(':id'=>$id, ':nom_plat'=>$nom_plat, ':prix_plat'=>$prix_plat);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom_plat',$nom_plat);
        $req->bindValue(':prix_plat',$prix_plat);

        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }

}
?>