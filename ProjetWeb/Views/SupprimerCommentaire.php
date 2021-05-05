<?PHP
include "../Controller/CommentaireC.php";


$commentaireC=new CommentaireC();
if (isset($_GET["id"])){
	$commentaireC->supprimerCommentaire($_GET["id"]);
header("Location:  CommentairesForum.php?id=".$_GET["idf"]);
}

?>