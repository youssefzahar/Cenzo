<?PHP
class LigneCommande{
    
    private $id ;
    private $id_commande ;
    private $id_produit ;
    private $quantite;
    private $prixunitaire;


    function __construct($id_commande,$id_produit,$quantite,$prixunitaire){

        $this->id_commande=$id_commande;
        $this->id_produit=$id_produit;
        $this->quantite=$quantite;
        $this->prixunitaire=$prixunitaire;
    }

    function getId(){
        return $this->id;
    }
    function getIdCommande(){
        return $this->id_commande;
    }
    function getIdProduit(){
        return $this->id_produit;
    }
    function getQuantite(){
        return $this->quantite;
    }
    function getPrixunitaire(){
        return $this->prixunitaire;
    }




    function setIdCommande($id_commande){
        $this->id_commande=$id_commande;
    }
    function setIdProduit($id_produit){
        $this->id_produit=$id_produit;
    }
    function setQuantite($quantite){
        $this->quantite=$quantite;
    }
    function setPrixunitaire($prixunitaire){
        $this->prixunitaire=$prixunitaire;
    }



}
?>
