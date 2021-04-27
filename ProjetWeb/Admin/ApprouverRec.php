<?PHP
include "../Controller/ReclamationC.php";


$reclamationC=new ReclamationC();
if (isset($_GET["id"])){
	$reclamationC->Approuver($_GET["id"]);
	header('Location: AfficherReclamations.php');
}

?>