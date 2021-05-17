<?PHP
include "../Controller/ReservationC.php";


$reservationC=new ReservationC();
if (isset($_POST["id_reservation"])){
	$reservationC->supprimerReservation($_POST["id_reservation"]);
	header('Location: AfficherReservations.php');
}

?>