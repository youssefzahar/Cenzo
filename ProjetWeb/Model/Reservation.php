<?PHP
	class Reservation{
		private $id_reservation;
		private $idclient;
		private $date;
		private $num_table;
		private $etat;

	public	function __construct($idclient,$date,$num_table,$etat){
			
	
			$this->idclient=$idclient;
			$this->date=$date;
			$this->num_table=$num_table;
			$this->etat=$etat;
		}
		
		function getId_reservation(){
			return $this->id_reservation;
		}
		function getIdclient(){
			return $this->idclient;
		}
		function getDate(){
			return $this->date;
		}
		function getNum_table(){
			return $this->num_table;
		}
		function getEtat(){
			return $this->etat;
		}



		function setIdclient($idclient){
			$this->idclient=$idclient;
		}
		function setDate($date){
			$this->date=$date;
		}
		function setNum_table($num_table){
			$this->num_table=$num_table;
		}
		function setEtat($etat){
			$this->etat=$etat;
		}	

	}
?>