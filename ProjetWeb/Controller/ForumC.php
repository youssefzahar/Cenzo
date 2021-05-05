<?php 
require_once "../config.php";
class ForumC{

    public function afficher($Forum){
        $id=$Forum->getid();
        $categorie=$Forum->getcategorie();
        $id_utilisateur=$Forum->getid_utilisateur();
        $sujet=$Forum->getsujet();
        $description=$Forum->getdescription();
        $etat=$Forum->getetat();
    }    
    
    function rechercherTicket($str){
        $sql="select * from Forum where description like '%".$str."%' or sujet like '%".$str."%' or categorie like '%".$str."%'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }


public function affichernomprenom($id){
    $sql="SELECT * From client where id=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherForums(){
    $sql="SELECT * From Forum";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherForumCom($id){
    $sql="SELECT * From Forum where id=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}
public function afficherForumCategorie($cat){
    $sql="SELECT * From Forum where categorie='".$cat."' and etat=1";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherForumsCategorie(){
    $sql="SELECT DISTINCT categorie From Forum";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

function NombreCategorie($nom){
        $sql="SELECT  * from Forum where categorie='".$nom."'";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            $nombre=$liste->rowCount();
            return $nombre;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function afficherCategories(){
    $sql="SELECT * From Categorie";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherForumsClient(){
    $sql="SELECT * From Forum where etat=1";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherMesForums($id){
    $sql="SELECT * From Forum where id_utilisateur=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

    function recupererForum($id){
        $sql="SELECT * from Forum where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function modifierForum($Forum,$id){
        $sql="UPDATE Forum SET categorie=:categorie,sujet=:sujet,description=:description WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->sForumtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $categorie=$Forum->getcategorie();
        $sujet=$Forum->getSujet();
        $description=$Forum->getDescription();
        $datas = array(':id'=>$id,':categorie'=>$categorie,':sujet'=>$sujet,':description'=>$description);
        $req->bindValue(':id',$id);
        $req->bindValue(':categorie',$categorie);
        $req->bindValue(':sujet',$sujet);
        $req->bindValue(':description',$description);
        
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
        function Approuver($id){
        $sql="UPDATE Forum SET etat=1 WHERE id=$id";
        
        $db = config::getConnexion();
        //$db->sForumtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
        function NonApprouver($id){
        $sql="UPDATE Forum SET etat=0 WHERE id=$id";
        
        $db = config::getConnexion();
        //$db->sForumtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
public function ajouterForum($Forum){
    $sql="insert into Forum(categorie,id_utilisateur,sujet,description,etat,date_creation) values(:categorie,:id_utilisateur,:sujet,:description,:etat,now())";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $categorie=$Forum->getCategorie();
        $id_utilisateur=$Forum->getId_utilisateur();
        $sujet=$Forum->getSujet();
        $description=$Forum->getDescription();
        $etat=$Forum->getEtat();
        $req->bindValue(':categorie',$categorie);
        $req->bindValue(':id_utilisateur',$id_utilisateur);
        $req->bindValue(':sujet',$sujet);
        $req->bindValue(':description',$description);
        $req->bindValue(':etat',$etat);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerForum($id){
    $sql="DELETE FROM Forum where id=:id";
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
}
?>