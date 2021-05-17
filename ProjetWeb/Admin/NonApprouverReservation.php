<?PHP
include "../Controller/ReservationC.php";


$ReservationC=new ReservationC();
if (isset($_GET["id_reservation"])){
	$ReservationC->NonApprouver($_GET["id_reservation"]);
	header('Location: AfficherReservations.php');
}

?>