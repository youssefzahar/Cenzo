<?php
//session_start();

$_SESSION['foods']=!isset($_SESSION['foods'])?array():$_SESSION['foods'];
$_SESSION['sum']=!isset($_SESSION['sum'])?0:$_SESSION['sum'];
?>
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="img/nav-logo.png" alt="nav-logo">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="index.php">Home</a>
                </li>

                <li><a href="shop_fullwidth.php">Menu</a></li>
                <li><a href="AjouterReservation.php">Reservation</a></li>

                <li><a href="recipe.php">Recette</a></li>
                    <?php if (isset($_SESSION['idclient'])) {
                        ?>
                        <li class="dropdown">
                            <a href="AfficherForums.php" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Forums<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="AfficherForums.php">Forums</a></li>
                                <li><a href="MesForums.php">Mes Publications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="AjouterReclamation.php" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Reclamations<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="AjouterReclamation.php">Ajouter Reclamation</a></li>
                                <li><a href="MesReclamations.php">Mes Reclamations</a></li>
                            </ul>
                        </li>
                        <li><a href="MonProfil.php">Mon Profil</a></li>
                        <li><a href="Deconnexion.php">Deconnexion</a></li>
                        <?php
                    } else { ?>
                        <li class="dropdown">
                            <a href="Connexion.php" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Connexion<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Connexion.php">Se Connecter</a></li>
                                <li><a href="sinscrire.php">S'inscrire</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>



                <li class="dropdown">
                    <a class="css-pointer dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false" href="shop_cart.php"><i
                                class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">
                <!-- --------------------------------------------------------- -->

                                    <?php
                                    $q = 0;
                                    foreach ($_SESSION['foods'] as $f) {
                                        $q += $f->quantity;

                                    }
                                    echo $q; ?> </span><span
                                class="caret"></span></a>
                    <div class="cart-content dropdown-menu">
                        <div class="cart-title">
                            <h4>Shopping Cart</h4>
                        </div>
                        <div class="cart-items">
                            <?php foreach ($_SESSION['foods'] as $f) { ?>


                                <div class="cart-item clearfix">
                                    <div class="cart-item-image">
                                        <a href="shop_single_full.html"><img src="img/cart-img1.jpg"
                                                                             alt="Breakfast with coffee"></a>
                                    </div>
                                    <div class="cart-item-desc">
                                        <a href="shop_single_full.html"><?= $f->name ?></a>
                                        <span class="cart-item-price"><?= $f->price ?> TND</span>
                                        <span class="cart-item-quantity">x <?= $f->quantity ?></span>
                                        <i class="fa fa-times ci-close"></i>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="cart-action clearfix">
                            <span class="pull-left checkout-price"><?= $_SESSION['sum'] ?> TND</span>
                            <a class="btn btn-default pull-right" href="shop_cart.php">View Cart</a>
                        </div>
                        <!-- --------------------------------------------------------- -->

                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
