<?php 
include "../config.php";
class MenuC{

    public function afficher($user){
        $id=$user->getid();
        $nom_plat=$user->getNom_plat();
        $prix_plat=$user->getPrix_plat();
        $image_plat=$user->getImage_plat();

}    
    
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
      /*  function recupereremail($email){
        $sql="SELECT * from menu where email=:email";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
        $req->bindValue(':email',$email);
        $req->execute();
        $res=$req->fetchAll();
        return $res;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }*/
        function recupererMenu($id){
        $sql="SELECT * from menu where id=:id";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $req->execute();
        $res=$req->fetchAll();
        return $res;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }



public function ajoutermenus($Menu){
    $sql="insert into menu(nom_plat,prix_plat,image_plat) values(:nom_plat,:prix_plat,image_plat)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $nom_plat=$menu->getNom_plat();
    $prix_plat=$menu->getPrix_plat();
    $prix_plat=$menu->getImage_plat();
    $req->bindValue(':nom_plat',$nom_plat);
    $req->bindValue(':prix_plat',$prix_plat);
    $req->bindValue(':image_plat',$image_plat);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
            //chya3mel update lil immage ama fil asel yajouti fil path
    function ajouterMenuimg($id,$image){
        $sql="UPDATE menu SET image=:image WHERE id=:id";
        $db = config::getConnexion();
        try{
        
        $req=$db->prepare($sql);
    
        $req->bindValue(':id',$id);
        $req->bindValue(':image',$image);

        
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

    function modifierMenuPwd($menu,$id){
        $sql="UPDATE menu SET nom_plat=:nom_plat,prix_plat=:prix_plat,image_plat=:image_plat WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nom_plat=$menu->getNom_plat();
        $prix_plat=$menu->getPrix_plat();
        $prix_plat=$menu->getImage_plat();
        $datas = array(':id'=>$id, ':nom_plat'=>$nom_plat, ':prix_plat'=>$prix_plat,':image_plat'=>$image_plat);
        $req->bindValue(':id',$id);
        $req->bindValue(':prix_plat',$prix_plat);
        $req->bindValue(':nom_plat',$nom_plat);
        $req->bindValue(':image_plat',$image_plat);
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
        function modifierMenu($menu,$id){
        $sql="UPDATE menu SET nom_plat=:nom_plat,prix_plat=:prix_plat,image_plat=:image_plat WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nom_plat=$menu->getNom_plat();
        $prix_plat=$menu->getPrix_plat();
        $prix_plat=$menu->getImage_plat();
        $datas = array(':id'=>$id, ':nom_plat'=>$nom_plat, ':prix_plat'=>$prix_plat,':image_plat'=>$image_plat);
        $req->bindValue(':id',$id);
        $req->bindValue(':nom_plat',$nom_plat);
        $req->bindValue(':prix_plat',$prix_plat);
        $req->bindValue(':image_plat',$image_plat);
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
  die;
        }
        
    }
}
?>