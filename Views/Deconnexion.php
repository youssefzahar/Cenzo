<?php 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
unset($_SESSION["client"]);
header("location: Connexion.php");
/*session deleted. if you try using this you've got an error*/
?>