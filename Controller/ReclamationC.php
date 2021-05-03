<?php 
require_once "../config.php";
class ReclamationC{

    public function afficher($Reclamation){
        $id=$Reclamation->getid();
        $categorie=$Reclamation->getcategorie();
        $id_utilisateur=$Reclamation->getid_utilisateur();
        $sujet=$Reclamation->getsujet();
        $description=$Reclamation->getdescription();
        $etat=$Reclamation->getetat();

}    
    
    function rechercherTicket($str){
        $sql="select * from Reclamation where categorie like '%".$str."%' or sujet like '%".$str."%'";
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

public function afficherReclamations(){
    $sql="SELECT * From Reclamation";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherReclamationCom($id){
    $sql="SELECT * From Reclamation where id=$id";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherReclamationsClient(){
    $sql="SELECT * From Reclamation where etat=1";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

    function recupererReclamation($id){
        $sql="SELECT * from Reclamation where id=$id";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function modifierReclamation($Reclamation,$id){
        $sql="UPDATE Reclamation SET id_utilisateur=:id_utilisateur,sujet=:sujet,description=:description,etat=:etat WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->sReclamationtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $id_utilisateur=$Reclamation->getId_utilisateur();
        $sujet=$Reclamation->getSujet();
        $description=$Reclamation->getDescription();
        $etat=$Reclamation->getEtat();
        $datas = array(':id'=>$id, ':id_utilisateur'=>$id_utilisateur,':sujet'=>$sujet,':description'=>$description,':etat'=>$etat);
        $req->bindValue(':id',$id);
        $req->bindValue(':id_utilisateur',$id_utilisateur);
        $req->bindValue(':sujet',$sujet);
        $req->bindValue(':description',$description);
        $req->bindValue(':etat',$etat);
        
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
        $sql="UPDATE Reclamation SET etat=1 WHERE id=$id";
        
        $db = config::getConnexion();
        //$db->sReclamationtribute(PDO::ATTR_EMULATE_PREPARES,false);
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
        $sql="UPDATE Reclamation SET etat=0 WHERE id=$id";
        
        $db = config::getConnexion();
        //$db->sReclamationtribute(PDO::ATTR_EMULATE_PREPARES,false);
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
public function ajouterReclamation($Reclamation){
    $sql="insert into Reclamation(id_utilisateur,sujet,description,etat) values(:id_utilisateur,:sujet,:description,:etat)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $id_utilisateur=$Reclamation->getId_utilisateur();
        $sujet=$Reclamation->getSujet();
        $description=$Reclamation->getDescription();
        $etat=$Reclamation->getEtat();
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
public function supprimerReclamation($id){
    $sql="DELETE FROM Reclamation where id=:id";
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