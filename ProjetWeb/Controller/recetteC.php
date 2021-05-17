<?php
class RecetteC
{
    public function ajouterRecette($recette){
        try{

            $db=config::getConnexion();
            $query=$db->prepare('INSERT INTO recette (nom,description,image) values (:nom, :description , :image )');

            $nom=$recette->getNom();
            $description=$recette->getDescription();
            $image=$recette->getImage();

            $query->bindValue(':nom',$nom);
            $query->bindValue(':description',$description);
            $query->bindValue(':image',$image);

            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function afficherRecettes(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM recette');
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function findRecettes($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM recette WHERE id= :id');
            $query->bindValue(':id',$id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function modifierRecette($id,$recette){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('UPDATE recette SET nom= :nom, description= :description WHERE id= :id');

            $nom=$recette->getNom();
            $description=$recette->getDescription();
            $image=$recette->getImage();

            $query->bindValue(':id',$id);
            $query->bindValue(':nom',$nom);
            $query->bindValue(':description',$description);


            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function deleteRecette($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM recette WHERE id= :id');
            $query->bindValue(':id',$id);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }



}
