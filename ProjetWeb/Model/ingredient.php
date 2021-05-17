<?php
class ingredient{

    private $id;
    private $nom;
    private $calories;
    private $image;



    public function __construct($nom, $calories, $image)
    {
        $this->nom = $nom;
        $this->calories = $calories;
        $this->image = $image;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getCalories()
    {
        return $this->calories;
    }


    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

}

?>
