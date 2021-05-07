<?php 
require_once "../config.php";
class ReclamationC{

    public function afficher($Reclamation){
        $id=$Reclamation->getid();
        $categorie=$Reclamation->getcategorie();
        $id_utilisateur=$Reclamation->getid_utilisateur();
        $sujet=$Reclamation->getsujet();
        $description=$Reclamation->getdescription();

}    
    
    function rechercherTicket($str){
        $sql="select * from Reclamation where description like '%".$str."%' or sujet like '%".$str."%'";
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

public function afficherMesReclamationCom($id){
    $sql="SELECT * From Reclamation where id_utilisateur=$id";
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
        $sql="UPDATE Reclamation SET sujet=:sujet,description=:description WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->sReclamationtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $sujet=$Reclamation->getSujet();
        $description=$Reclamation->getDescription();
        $datas = array(':id'=>$id, ':sujet'=>$sujet,':description'=>$description);
        $req->bindValue(':id',$id);
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

public function ajouterReclamation($Reclamation){
    $sql="insert into Reclamation(id_utilisateur,sujet,description) values(:id_utilisateur,:sujet,:description)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
        $id_utilisateur=$Reclamation->getId_utilisateur();
        $sujet=$Reclamation->getSujet();
        $description=$Reclamation->getDescription();
        $req->bindValue(':id_utilisateur',$id_utilisateur);
        $req->bindValue(':sujet',$sujet);
        $req->bindValue(':description',$description);
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