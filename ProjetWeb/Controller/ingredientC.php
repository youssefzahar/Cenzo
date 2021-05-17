<?php
class ingredientC
{
    public function ajouterInredient($ingredient){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('INSERT INTO ingredient (nom, calories,image) values (:nom, :calories, :image )');

            $nom=$ingredient->getNom();
            $calories=$ingredient->getCalories();
            $image=$ingredient->getImage();


            $query->bindValue(':nom',$nom);
            $query->bindValue(':calories',$calories);
            $query->bindValue(':image',$image);


            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function afficherInredients(){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM ingredient');
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function rechercherInredients($nom){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM ingredient where nom like :nom');
            $query->bindValue(':nom',"%".$nom."%");
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function findInredients($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM ingredient WHERE id= :id');
            $query->bindValue(':id',$id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function modifierInredients($id,$ingredient){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('UPDATE ingredient SET nom= :nom, calories= :calories,image= :image WHERE id= :id');


            $nom=$ingredient->getNom();
            $calories=$ingredient->getCalories();
            $image=$ingredient->getImage();


            $query->bindValue(':id',$id);

            $query->bindValue(':nom',$nom);
            $query->bindValue(':calories',$calories);
            $query->bindValue(':image',$image);

            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function deleteInregients($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM ingredient WHERE id= :id');
            $query->bindValue(':id',$id);
            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }



}

