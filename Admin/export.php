<?php
require('database.php');
$sql="select * from evenement";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>ID</td><td>Nom Evenement</td><td>Date Debut</td><td>Date Fin</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id'].'</td><td>'.$row['nom_evenement'].'</td><td>'.$row['date_debut'].'</td><td>'.$row['date_fin'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=tableau evenement.xls');
echo $html;
?>