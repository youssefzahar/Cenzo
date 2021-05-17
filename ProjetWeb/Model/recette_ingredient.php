<?php
class recette_ingredient{

    private $id_recette;
    private $id_ingredient;



    public function __construct($id_recette, $id_ingredient)
    {
        $this->id_recette = $id_recette;
        $this->id_ingredient = $id_ingredient;
    }


    public function getIdrecette()
    {
        return $this->id_recette;
    }

    public function setIdrecette($id_recette)
    {
        $this->id_recette = $id_recette;
    }

    public function getIdIngredient()
    {
        return $this->id_ingredient;
    }

    public function setIdIngredient($id_ingredient)
    {
        $this->id_ingredient = $id_ingredient;
    }



}
