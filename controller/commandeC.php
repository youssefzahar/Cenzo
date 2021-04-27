<?php


class CommandeC {

    public function afficherCommande(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM commande');//reqt
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function ajouterCommande($c){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('INSERT INTO COMMANDE (id,id_client,nbrproduit,totalprix,date,etat,adresse,numeroTelephone) values (:id,:idclient, :nbrproduit, :totaleprix, :date, :etat,:adresse,:numerotelephone)');//reqt
            $id=$c->getId();
            $idclient=$c->getIdClient();
            $nbrproduit=$c->getNbrproduit();
            $totalprix=$c->getTotalprix();
            $date=$c->getDate();
            $etat=$c->getEtat();
            $adresse=$c->getAdresse();
            $telephone=$c->getNumeroTelephone();


            $query->bindValue(':id',$id);
            $query->bindValue(':idclient',$idclient);
            $query->bindValue(':nbrproduit',$nbrproduit);
            $query->bindValue(':totaleprix',$totalprix);
            $query->bindValue(':date',$date);
            $query->bindValue(':etat',$etat);
            $query->bindValue(':adresse',$adresse);
            $query->bindValue(':numerotelephone',$telephone);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }

    }

    public function delete($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM COMMANDE WHERE id= :id');//reqt
            $query->bindValue(':id',$id);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function setConfirme($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('UPDATE COMMANDE SET etat= :etat WHERE id= :id');//reqt
            $query->bindValue(':id',$id);
            $query->bindValue(':etat','Confirme');
            $query->execute();

            $from = "seifeddine.amara@esprit.tn";
            $to = "ahmed.louhaichi@esprit.tn";
            $subject = "Commande";
            $message = "votre commande a ete confirmer ";
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function setAnnule($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('UPDATE COMMANDE SET etat= :etat WHERE id= :id');//reqt
            $query->bindValue(':id',$id);
            $query->bindValue(':etat','Annule');
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}


?>
