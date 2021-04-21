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
            $query=$db->prepare('INSERT INTO COMMANDE (id,id_client,nbrproduit,totalprix,date,etat) values (:id,:idclient, :nbrproduit, :totaleprix, :date, :etat)');//reqt
            $id=$c->getId();
            $idclient=$c->getIdClient();
            $nbrproduit=$c->getNbrproduit();
            $totalprix=$c->getTotalprix();
            $date=$c->getDate();
            $etat=$c->getEtat();

            $query->bindValue(':id',$id);
            $query->bindValue(':idclient',$idclient);
            $query->bindValue(':nbrproduit',$nbrproduit);
            $query->bindValue(':totaleprix',$totalprix);
            $query->bindValue(':date',$date);
            $query->bindValue(':etat',$etat);
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
