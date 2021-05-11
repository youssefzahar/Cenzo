<?php
require('database.php');
$sql="select * from reservation";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>Id Reservation</td><td>id client</td><td>Date</td><td>nombre de personne</td><td>Etat</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id_reservation'].'</td><td>'.$row['idclient'].'</td><td>'.$row['date'].'</td><td>'.$row['num_table'].'</td><td>'.$row['etat'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=tableau reservation.xls');
echo $html;
?>