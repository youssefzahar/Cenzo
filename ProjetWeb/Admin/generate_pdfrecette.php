<?php
require('database.php');
$sql="select * from recette";
$res=mysqli_query($con,$sql);
$html='<table><tr><td>id</td><td>nom</td><td>description</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id'].'</td><td>'.$row['nom'].'</td><td>'.$row['description'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=tableau reservation.xls');
echo $html;
?>