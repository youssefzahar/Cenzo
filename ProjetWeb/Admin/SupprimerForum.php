<?PHP
include "../Controller/ForumC.php";


$forumC=new ForumC();
if (isset($_POST["id"])){
	$forumC->supprimerForum($_POST["id"]);
	header('Location: AfficherForums.php');
}

?>