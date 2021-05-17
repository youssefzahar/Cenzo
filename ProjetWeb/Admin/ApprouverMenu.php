<?PHP
include "../Controller/MenuC.php";


$menuC=new MenuC();
if (isset($_GET["id"])){
	$menuC->Approuver($_GET["id"]);
	header('Location: AfficherMenus.php');
}

?>