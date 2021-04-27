<?php 
include  "../Model/Forum.php";
include  "../Controller/ForumC.php";

  session_start();
if($_SESSION['client']=="")
{
    header("location: Connexion.php");
}

$forumC= new ForumC();

if(isset($_POST['Ajouter']))
{

$forum=new Forum($_SESSION['idclient'],$_POST['categorie'],$_POST['sujet'],$_POST['description'],0);
$forumC->ajouterForum($forum);
header('Location: AfficherForums.php');
    
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:57 GMT -->
<head>
<meta charset="utf-8">
<title>Ajouter Forum</title>
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
<h2 class="text-uppercase">FORUM</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<section class="main-content contact-content">
<div class="container">
<div class="col-md-10 col-md-offset-1">
<div class="row">
<div class="col-md-10">
<form class="contact-form" id="form_forum" method="post" enctype="multipart/form-data">
	<h3 class="text-left no-margin-top">Categorie</h3>

<div class="form-group">
					<div>
                  <select class="selectpicker" name="categorie">
                    <option value="">Selectionner une categorie</option>
                    <option value="Food Tn">Food Tn</option>
                    <option value="Hrisa">Hrisa</option>
                  </select>
              </div>
	</div>
<div class="form-group">
<input class="form-control" placeholder="Subject" type="text" id="sujet" name="sujet">
</div>
<div class="form-group">
<textarea class="form-control" name="description" id="description" placeholder="Description" rows="5"></textarea>
</div>
<input class="btn btn-default btn-lg btn-block" type="submit" value="Ajouter" name="Ajouter" id="Ajouter">

</form>
<div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
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
<script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendor/mc/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="js/vendor/map.js"></script>

<script src="js/vendor/validate.js"></script>
<script src="js/contact.js"></script>
<script src="js/Forum.js"></script>

<script src="js/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:58 GMT -->
</html>
