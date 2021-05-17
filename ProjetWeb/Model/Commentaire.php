<?PHP
	class Commentaire{
		private $id;
		private $id_forum;
		private $id_utilisateur;
		private $com;
		private $date;

		
		function __construct($id_forum,$id_utilisateur,$com){
			
			$this->id_utilisateur=$id_utilisateur;
			$this->id_forum=$id_forum;
			$this->com=$com;
		}
		
		function getId(){
			return $this->id;
		}
		function getId_utilisateur(){
			return $this->id_utilisateur;
		}
		function getId_forum(){
			return $this->id_forum;
		}
		function getCom(){
			return $this->com;
		}
		function getDate(){
			return $this->date;
		}

		function setId_utilisateur($id_utilisateur){
			$this->id_utilisateur=$id_utilisateur;
		}
		function setId_forum($id_forum){
			$this->id_forum=$id_forum;
		}
		function setCom($com){
			$this->com=$com;
		}	
		function setDate($date){
			$this->date=$date;
		}		
	

	}
?>