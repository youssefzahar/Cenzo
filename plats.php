<?PHP
	class Plat{
		private $id ;
		private $nom ;
		private $prix;
		
		
		function __construct($nom,$prix){
			
			$this->nom=$nom;
			$this->prix=$prix;
		}
		
		function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrix(){
			return $this->prix;
		}
	

		function setNom( $nom){
			$this->nom=$nom;
		}
		function setPrix($prix){
			$this->prix=$prix;
		}
		

	}
?>
