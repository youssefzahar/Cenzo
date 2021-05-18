<?php
require('database.php');
$sql="select * from fidelite";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>ID</td><td>Nom Client</td><td>Prenom Client</td><td>Nombre de Point</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id'].'</td><td>'.$row['nom_client'].'</td><td>'.$row['prenom_client'].'</td><td>'.$row['nbr_point'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=tableau fidelite.xls');
echo $html;
?>