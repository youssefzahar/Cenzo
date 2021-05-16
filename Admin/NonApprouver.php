<?PHP
include "../Controller/ForumC.php";


$forumC=new ForumC();
if (isset($_GET["id"])){
	$forumC->NonApprouver($_GET["id"]);
	header('Location: AfficherForums.php');
}

?>