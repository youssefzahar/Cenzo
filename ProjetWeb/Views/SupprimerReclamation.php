<?PHP
include "../Controller/ReclamationC.php";


$reclamationC=new ReclamationC();
if (isset($_POST["id"])){
	$reclamationC->supprimerReclamation($_POST["id"]);
	header('Location: MesReclamations.php');
}

?>