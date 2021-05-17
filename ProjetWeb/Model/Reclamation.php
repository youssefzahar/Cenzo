<?PHP
	class Reclamation{
		private $id;
		private $id_Utilisateur;
		private $sujet;
		private $description;

		function __construct($id_Utilisateur,$sujet,$description){
			
			$this->id_Utilisateur=$id_Utilisateur;
			$this->sujet=$sujet;
			$this->description=$description;
		}
		
		function getId(){
			return $this->id;
		}
		function getId_Utilisateur(){
			return $this->id_Utilisateur;
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

		function setId_utilisateur($id_utilisateur){
			$this->id_utilisateur=$id_utilisateur;
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

	}
?>