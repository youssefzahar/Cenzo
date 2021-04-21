<?PHP
class Recette{
    private $id ;
    private $nom ;
    private $description;
    private $image;


    public function __construct($nom, $description, $image)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
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


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }




}
?>
