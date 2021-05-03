<?PHP
	class Reservation{
		private $id_reservation;
		private $id_client;
		private $date;
		private $num_table;
		private $etat;

		function __construct($id_client,$date,$num_table,$etat){
			
			$this->id_client=$id_client;
			$this->date=$date;
			$this->num_table=$num_table;
			$this->etat=$etat;
		}
		
		function getId(){
			return $this->id_reservation;
		}
		function getId_client(){
			return $this->id_client;
		}
		function getdate(){
			return $this->date;
		}
		function getnum_table(){
			return $this->num_table;
		}
		function getEtat(){
			return $this->etat;
		}

		function setId_client($id_client){
			$this->id_client=$id_client;
		}
		function setdate($date){
			$this->date=$date;
		}
		function setnum_table($num_table){
			$this->num_table=$num_table;
		}
		function setEtat($etat){
			$this->etat=$etat;
		}	

	}
?>