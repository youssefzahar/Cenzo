<?php
   

    class platsC {

        public function afficherPlats(){
            try{
                $db=config::getConnexion();
                $query=$db->prepare('SELECT * FROM plats');//reqt
                $query->execute();
                return $query->fetchAll();//return ligne dan requette de bd 
            }catch(PDOException $e){
                $e->getMessage();
            }
                
        }

        public function findproduit($id){
            try{
                $db=config::getConnexion();
                $query=$db->prepare('SELECT * FROM plats WHERE id = :id');//reqt
                $query->bindValue(':id',$id);
                $query->execute();
                return $query->fetchAll();//return ligne dan requette de bd
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
    }


?>
