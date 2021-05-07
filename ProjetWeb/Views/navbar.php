<?php
    session_start();
?>
<nav class="navbar navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
<a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="index.php">Home - Image</a></li>
<li><a href="index_slider.html">Home - Header Slider</a></li>
<li><a href="index_video.html">Home - Video Background</a></li>
<li><a href="index_parallax.html">Home - Parallax</a></li>
<li><a href="index_animation.html">Home - Scroll Animation</a></li>
</ul>
</li>
<li class="dropdown">
<a href="menu_all.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="menu_list.html">Menu - List</a></li>
<li><a href="menu_overlay.html">Menu - Overlay</a></li>
<li><a href="menu_tile.html">Menu - Tile</a></li>
<li><a href="menu_grid.html">Menu - Grid</a></li>
<li><a href="menu_all.html">Menu All</a></li>
</ul>
</li>
<li class="dropdown">
<a href="about.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="about.html">About</a></li>
<li><a href="gallery.html">Gallery</a></li>
<li><a href="elements.html">Shortcodes</a></li>
<li><a href="shop_account.html">Login / Signup</a></li>
<li><a href="404.html">404 Page</a></li>
</ul>
</li>
<li class="dropdown">
<a href="recipe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipe<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="recipe.html">Recipe - 2Col</a></li>
<li><a href="recipe_3col.html">Recipe - 3Col</a></li>
<li><a href="recipe_4col.html">Recipe - 4Col</a></li>
<li><a href="recipe_masonry.html">Recipe - Masonry</a></li>
<li>
<a href="recipe_detail-image.html">Recipe - Single <span class="caret-right"></span></a>
<ul class="dropdown-menu">
<li><a href="recipe_detail-image.html">Recipe - Image</a></li>
<li><a href="recipe_detail-slider.html">Recipe - Gallery</a></li>
<li><a href="recipe_detail-video.html">Recipe - Video</a></li>
</ul>
</li>
</ul>
</li>

<li><a href="contact.html">Contact</a></li>
            <?php if($_SESSION['client']=="")
            { ?>
<li><a href="AfficherForums.php">Forums</a></li>
<li class="dropdown">
<a href="Connexion.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connexion<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="Connexion.php">Se Connecter</a></li>
<li><a href="sinscrire.php">S'inscrire</a></li>
</ul>
</li>
            <?php 
          }
          else
          {
            ?>
<li class="dropdown">
<a href="AfficherForums.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Forums<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="AfficherForums.php">Forums</a></li>
<li><a href="MesForums.php">Mes Publications</a></li> 
</ul>
</li>
<li class="dropdown">
<a href="AjouterReclamation.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reclamations<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="AjouterReclamation.php">Ajouter Reclamation</a></li>
<li><a href="MesReclamations.php">Mes Reclamations</a></li> 
</ul>
</li>
<li><a href="MonProfil.php">Mon Profil</a></li>
<li><a href="Deconnexion.php">Deconnexion</a></li>
            <?php 
          }
          ?><li class="dropdown">
<a class="css-pointer dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">3</span><span class="caret"></span></a>
<div class="cart-content dropdown-menu">
<div class="cart-title">
<h4>Shopping Cart</h4>
</div>
<div class="cart-items">
<div class="cart-item clearfix">
<div class="cart-item-image">
<a href="shop_single_full.html"><img src="img/cart-img1.jpg" alt="Breakfast with coffee"></a>
</div>
<div class="cart-item-desc">
<a href="shop_single_full.html">Breakfast with coffee</a>
<span class="cart-item-price">$19.99</span>
<span class="cart-item-quantity">x 2</span>
<i class="fa fa-times ci-close"></i>
</div>
</div>
<div class="cart-item clearfix">
<div class="cart-item-image">
<a href="shop_single_full.html"><img src="img/cart-img2.jpg" alt="Chicken stew"></a>
</div>
<div class="cart-item-desc">
<a href="shop_single_full.html">Chicken stew</a>
<span class="cart-item-price">$24.99</span>
<span class="cart-item-quantity">x 3</span>
 <i class="fa fa-times ci-close"></i>
</div>
</div>
</div>
<div class="cart-action clearfix">
<span class="pull-left checkout-price">$ 114.95</span>
<a class="btn btn-default pull-right" href="shop_cart.html">View Cart</a>
</div>
</div>
</li>
</ul>
</div>

</div>
</nav>