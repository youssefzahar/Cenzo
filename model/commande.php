<?PHP
class Commande{
    private $id ;
    private $id_client ;
    private $nbrproduit;
    private $totalprix;
    private $date;
    private $etat;
    private $adresse;
    private $numeroTelephone;


    public function __construct($id, $id_client, $nbrproduit, $totalprix, $date, $etat, $adresse, $numeroTelephone)
    {
        $this->id = $id;
        $this->id_client = $id_client;
        $this->nbrproduit = $nbrproduit;
        $this->totalprix = $totalprix;
        $this->date = $date;
        $this->etat = $etat;
        $this->adresse = $adresse;
        $this->numeroTelephone = $numeroTelephone;
    }


    public function getAdresse()
    {
        return $this->adresse;
    }


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }


    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;
    }


    function getId(){
        return $this->id;
    }
    function getIdClient(){
        return $this->id_client;
    }
    function getNbrproduit(){
        return $this->nbrproduit;
    }
    function getTotalprix(){
        return $this->totalprix;
    }
    function getDate(){
        return $this->date;
    }
    function getEtat(){
        return $this->etat;
    }


    function setId($id){
        $this->id=$id;
    }
    function setIdClient($id_client){
        $this->id_client=$id_client;
    }
    function setNbrproduit($nbrproduit){
        $this->nbrproduit=$nbrproduit;
    }
    function setTotalprix($totalprix){
        $this->totalprix=$totalprix;
    }
    function setDate($date){
        $this->date=$date;
    }
    function setEtat($etat){
        $this->etat=$etat;
    }

}
?>
