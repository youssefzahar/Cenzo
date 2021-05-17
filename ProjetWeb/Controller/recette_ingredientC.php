<?php
class recette_ingredientC
{

    public function ajouterrecette_ingredient($recette_ingredient){
        try{




            $db=config::getConnexion();
            $query2=$db->prepare('select MAX(id) from recette');
            $query2->execute();
            $r=$query2->fetch();

            $query=$db->prepare('INSERT INTO recette_ingredient (id_recette, id_ingredient) values (:id_recette, :id_ingredient)');

            $id_recette=$r['MAX(id)'];
            $id_ingredient=$recette_ingredient->getIdIngredient();


            $query->bindValue(':id_recette',$id_recette);
            $query->bindValue(':id_ingredient',$id_ingredient);


            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function updaterecette_ingredient($recette_ingredient,$id_recette){
        try{
            $db=config::getConnexion();


            $query=$db->prepare('INSERT INTO recette_ingredient (id_recette, id_ingredient) values (:id_recette, :id_ingredient)');

            $id_ingredient=$recette_ingredient->getIdIngredient();


            $query->bindValue(':id_recette',$id_recette);
            $query->bindValue(':id_ingredient',$id_ingredient);


            $query->execute();

        }catch(PDOException $e){
            $e->getMessage();
        }
    }


    public function findrecette_ingredientsbyrecette($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('SELECT * FROM recette_ingredient WHERE id_recette= :id');
            $query->bindValue(':id',$id);
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }



    public function forupdaterecette_ingredient($id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare('DELETE FROM recette_ingredient WHERE id_recette= :id_recette');
            $query->bindValue(':id_recette',$id);
            $query->execute();



        }catch(PDOException $e){
            $e->getMessage();
        }
    }


}

