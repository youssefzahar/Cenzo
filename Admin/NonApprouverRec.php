<?PHP
include "../Controller/ReclamationC.php";


$reclamationC=new ReclamationC();
if (isset($_GET["id"])){
	$reclamationC->NonApprouver($_GET["id"]);
	header('Location: AfficherReclamations.php');
}

?>