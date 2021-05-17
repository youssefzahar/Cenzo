<?php 
require_once "../config.php";
class ReservationC{

    public function afficher($Reservation){
        $id_reservation=$Reservation->getid_reservation();
        $idclient=$Reservation->getidclient();
        $date=$Reservation->getdate();
        $num_table=$Reservation->getnum_table();
        $etat=$Reservation->getetat();

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

public function afficherReservations(){
    $sql="SELECT * From Reservation";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherReservationCom($id_reservation){
    $sql="SELECT * From Reservation where id_reservation=$id_reservation";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

public function afficherReservationsClient(){
    $sql="SELECT * From Reservation where etat=1";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

    function recupererReservation($id_reservation){
        $sql="SELECT * from Reservation where id_reservation=$id_reservation";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function modifierReservation($Reservation,$id_reservation){
        $sql="UPDATE Reservation SET idclient=:idclient, date=:date ,num_table=:num_table,etat=:etat WHERE id_reservation=:id_reservation";
        
        $db = config::getConnexion();
        //$db->sReservationtribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $idclient=$Reservation->getidclient();
        $date=$Reservation->getDate();
        $num_table=$Reservation->getNum_table();
        $etat=$Reservation->getEtat();
        $datas = array(':id_reservation'=>$id_reservation, ':idclient'=>$idclient,':date'=>$date,':num_table'=>$num_table,':etat'=>$etat);
        $req->bindValue(':id_reservation',$id_reservation);
        $req->bindValue(':idclient',$idclient);
        $req->bindValue(':date',$date);
        $req->bindValue(':num_table',$num_table);
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
        function Approuver($id_reservation){
        $sql="UPDATE Reservation SET etat=1 WHERE id_reservation=$id_reservation";
        
        $db = config::getConnexion();
        //$db->sReservationtribute(PDO::ATTR_EMULATE_PREPARES,false);
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
        function NonApprouver($id_reservation){
        $sql="UPDATE Reservation SET etat=0 WHERE id_reservation=$id_reservation";
        
        $db = config::getConnexion();
        //$db->sReservationtribute(PDO::ATTR_EMULATE_PREPARES,false);
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
public function ajouterReservation($Reservation){
    $sql="insert into Reservation(idclient,date,num_table,etat) values(:idclient,:date,:num_table,:etat)";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    
        $idclient=$Reservation->getidclient();
        $date=$Reservation->getDate();
        $num_table=$Reservation->getNum_table();
        $etat=$Reservation->getEtat();
        $req->bindValue(':idclient',$idclient);
        $req->bindValue(':date',$date);
        $req->bindValue(':num_table',$num_table);
        $req->bindValue(':etat',$etat);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
public function supprimerReservation($id_reservation){
    $sql="DELETE FROM Reservation where id_reservation=:id_reservation";
    $db=config::getConnexion();
    try{
    $req=$db->prepare($sql);
    $req->bindValue(':id_reservation',$id_reservation);
    $req->execute();
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
    
}
}
?>