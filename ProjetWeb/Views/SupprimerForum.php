<?PHP
include "../Controller/ForumC.php";
include "../Controller/CommentaireC.php";


$forumC=new ForumC();
$commentaireC= new CommentaireC();

if (isset($_POST["id"])){
	$commentaireC->supprimerComForum($_POST["id"]);
	$forumC->supprimerForum($_POST["id"]);
	header('Location: MesForums.php');
}

?>