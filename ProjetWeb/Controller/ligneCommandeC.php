<?php


class LigneCommandeC {

    public function afficherLigneCommande($idcommande){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM lignecommande where id_commande= :idcommande');//reqt
            $query->bindValue(':idcommande',$idcommande);
            $query->execute();
            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function ajouterLigneCommande($lc){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('INSERT INTO LIGNECOMMANDE (id_commande,id_produit,quantite,prixunitaire) values (:idcommande, :idproduit, :quantite, :prixunitaire)');//reqt

            $idcommande=$lc->getIdCommande();
            $idproduit=$lc->getIdProduit();
            $quantite=$lc->getQuantite();
            $prix=$lc->getPrixunitaire();

            $query->bindValue(':idcommande',$idcommande);
            $query->bindValue(':idproduit',$idproduit);
            $query->bindValue(':quantite',$quantite);
            $query->bindValue(':prixunitaire',$prix);
            $query->execute();

            return $query->fetchAll();//return ligne dan requette de bd
        }catch(PDOException $e){
            $e->getMessage();
        }

    }

}


?>
