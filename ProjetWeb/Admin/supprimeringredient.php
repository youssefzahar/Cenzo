<?php
include "../config.php";

require_once "../controller/ingredientC.php";

if(isset($_GET['id'])){

    $ingredientC = new ingredientC();
    $ingredientC->deleteInregients($_GET['id']);
    header('Location:ingredient.php');
}

?>
