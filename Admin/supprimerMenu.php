<?PHP
include "../Controller/MenuC.php";


$menuC=new MenuC();
if (isset($_POST["id"])){
	$menuC->supprimerMenu($_POST["id"]);
	header('Location: AfficherMenus.php');
}

?>