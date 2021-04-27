<?PHP
	class Forum{
		private $id;
		private $id_utilisateur;
		private $categorie;
		private $sujet;
		private $description;
		private $etat;
		private $date_creation;

		
		function __construct($id_utilisateur,$categorie,$sujet,$description,$etat){
			
			$this->id_utilisateur=$id_utilisateur;
			$this->categorie=$categorie;
			$this->sujet=$sujet;
			$this->description=$description;
			$this->etat=$etat;
		}
		
		function getId(){
			return $this->id;
		}
		function getId_utilisateur(){
			return $this->id_utilisateur;
		}
		function getCategorie(){
			return $this->categorie;
		}
		function getSujet(){
			return $this->sujet;
		}
		function getDescription(){
			return $this->description;
		}
		function getEtat(){
			return $this->etat;
		}
		function getDate_creation(){
			return $this->date_creation;
		}

		function setId_utilisateur($id_utilisateur){
			$this->id_utilisateur=$id_utilisateur;
		}
		function setCategorie($categorie){
			$this->categorie=$categorie;
		}
		function setSujet($sujet){
			$this->sujet=$sujet;
		}
		function setDescription($description){
			$this->description=$description;
		}
		function setEtat($etat){
			$this->etat=$etat;
		}		
		function setDate_creation($date_creation){
			$this->date_creation=$date_creation;
		}		
	

	}
?>