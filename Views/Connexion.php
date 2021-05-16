<?php

include "../Model/client.php";
include "../Controller/ClientC.php";

session_start();

if(isset($_SESSION['idclient']))
{

    header("location: index.php");
}

if($_POST['connecter'])
{


   $email=$_POST["email"];
   $clientC = new ClientC();

   $liste=$clientC->recupereremail($email);

   //var_dump($res);
    foreach($liste as $row){
      $mdp=$row['mdp'];
    }
    if (password_verify($_POST["mdp"],$mdp))
    {
    $liste=$clientC->recupereremail($email);
     foreach($liste as $row){
      $id=$row['id'];
      $nom=$row['nom'];
      $prenom=$row['prenom'];
      $email=$row['email'];
      $mdp=$row['mdp'];
      $tel=$row['tel'];
      $adresse=$row['adresse'];
      $sexe=$row['sexe'];
      $date_naiss=$row['date_nais'];
      $image=$row['image'];
    }

         $_SESSION['idclient'] = $id;
         $_SESSION['client'] = $nom ." ".$prenom;
         $_SESSION['clientemail'] = $email;
         $_SESSION['clienttel'] = $tel;
         $_SESSION['clientadresse'] = $adresse;
         $_SESSION['clientsexe'] = $sexe;
         $_SESSION['clientdate_naiss'] = $date_naiss;
         $_SESSION['clientimage'] = $image;

         header("location: index.php");

    }
   else
   {
             header("location: Connexion.php");
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:39 GMT -->
<head>
<meta charset="utf-8">
<title>Se Connecter</title>
<meta name="author" content="Surjith S M">

<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="shortcut icon" href="img/favicon.ico">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="preloder animated">
<div class="scoket">
<img src="img/preloader.svg" alt="" />
</div>
</div>
<div class="body">
<div class="main-wrapper">

    <?php include'navbar.php'  ?>

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Compte</h2>
<p>Veuillez vous connecter ou vous inscrire pour continuer votre achat</p>
</div>
</div>
</div>
</section>

<section class="shop-content">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="row shop-login">
<div class="col-md-12">
<div class="box-content">
<h3 class="text-center">CLIENT EXISTANT</h3>
<br>
<form class="logregform" method="post" enctype="multipart/form-data" >
<div class="row">
<div class="form-group">
<div class="col-md-12">
<label>Nom d'utilisateur ou adresse e-mail</label>
<input type="text" value="" class="form-control" name="email">
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="form-group">
<div class="col-md-12">
<a class="pull-right" href="RecupererMdp.php">(Mot de passe perdu?)</a>
<label>Mot de passe</label>
<input type="password" value="" class="form-control" name="mdp">
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6">
<span class="remember-box checkbox">
<label for="rememberme">
<input type="checkbox" id="rememberme" name="rememberme">Remember Me
</label>
</span>
</div>
<div class="col-md-6">
<input class="btn btn-default pull-right" type="submit" value="Se Connecter" name="connecter" id="connecter">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

    <?php include'footer.php'  ?>

</div>
</div>

<div class="b-settings-panel">
<div class="settings-section">
<span>
Boxed
</span>
<div class="b-switch">
<div class="switch-handle"></div>
</div>
<span>
Wide
</span>
</div>
<hr class="dashed" style="margin: 15px 0px;">
<h5>Main Background</h5>
<div class="settings-section bg-list">
<div class="bg-wood_pattern"></div>
<div class="bg-shattered"></div>
<div class="bg-vichy"></div>
<div class="bg-random-grey-variations"></div>
<div class="bg-irongrip"></div>
<div class="bg-gplaypattern"></div>
<div class="bg-diamond_upholstery"></div>
<div class="bg-denim"></div>
<div class="bg-crissXcross"></div>
<div class="bg-climpek"></div>
</div>
<hr class="dashed" style="margin: 15px 0px;">
<h5>Color Scheme</h5>
<div class="settings-section color-list">
<div data-src="css/themes/blue.css" style="background: #45b5f5"></div>
<div data-src="css/themes/brown.css" style="background: #dc8068"></div>
<div data-src="css/themes/cyan.css" style="background: #00becc"></div>
<div data-src="css/themes/green.css" style="background: #5bb75b"></div>
<div data-src="css/themes/orange.css" style="background: #ff7149"></div>
<div data-src="css/themes/pink.css" style="background: #fba1a1"></div>
<div data-src="css/themes/red.css" style="background: #dc3522"></div>
<div data-src="css/themes/yellow.css" style="background: #fdb813"></div>
</div>
<a data-src="css/style.css" class="reset"><span class="bg-wood_pattern">Reset</span></a>
<div class="btn-settings"></div>
</div>


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery.flexslider-min.js"></script>
<script src="js/vendor/spectragram.js"></script>
<script src="js/vendor/owl.carousel.min.js"></script>
<script src="js/vendor/velocity.min.js"></script>
<script src="js/vendor/velocity.ui.min.js"></script>
<script src="js/vendor/bootstrap-datepicker.min.js"></script>
<script src="js/vendor/bootstrap-clockpicker.min.js"></script>
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/vendor/isotope.pkgd.min.js"></script>
<script src="js/vendor/slick.min.js"></script>
<script src="js/vendor/wow.min.js"></script>
<script src="js/animation.js"></script>
<script src="js/vendor/vegas/vegas.min.js"></script>
<script src="js/vendor/jquery.mb.YTPlayer.js"></script>
<script src="js/vendor/jquery.stellar.js"></script>
<script src="js/main.js"></script>
<script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendor/mc/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:39 GMT -->
</html>
