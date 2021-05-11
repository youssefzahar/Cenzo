<?php 


if(!isset($_SESSION)){
    session_start();
}



include  "../Model/Reservation.php";
include  "../Controller/ReservationC.php";

if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['client']=="")
{
    header("location: Connexion.php");
}

$ReservationC= new ReservationC();

if(isset($_POST['Ajouter']))
{
$Reservation=new Reservation($_SESSION['idclient'],$_POST['date'],$_POST['num_table'],0);
$ReservationC->ajouterReservation($Reservation);
header('Location: AjouterReservation.php'); 
}


?>            
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:57 GMT -->
<head>
<meta charset="utf-8">
<title>Ajouter Reservation</title>
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









</div>
</nav>

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Reservation</h2>
<p>Réserver maintenant !</p>
</div>
</div>
</div>
</section>

<section class="reservation">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Reservations<small>Veuillez saisir le nombre de personnes et la date</small></h1>
</div>
</div>
</div>


<div class="reservation-form wow fadeInUp">
<form class="contact-form" method="post">
<div class="form-group">
<label>Date et Heure</label>
<input type="datetime-local" id="date" class="form-control" name="date" >
</div>
</div>


<div id="num_table" class="col-md-7">
<div class="form-group">
<label>Table de</label>
<select name="num_table" class="feedFormField">
<option selected disabled>Table pour combien de personnes?</option>
<option value="1">1 Personne</option>
<option value="2">2 Personnes</option>
<option value="3">3 Personnes</option>
<option value="4">4 Personnes</option>
<option value="5">5 Personnes</option>
<option value="6">6 Personnes</option>
<option value="7">7 Personnes</option>
<option value="8">8 Personnes</option>
<option value="9">9 Personnes</option>
<option value="10">10 Personnes</option>
<option value="11">11 Personnes</option>
<option value="12">12 Personnes</option>
<option value="13">13 Personnes</option>
<option value="14">14 Personnes</option>
<option value="15">15 Personnes</option>
<option value="16">16 Personnes</option>
<option value="17">17 Personnes</option>
<option value="18">18 Personnes</option>
<option value="19">19 Personnes</option>
<option value="20">20 Personnes</option>
</select>
<i class="fa fa-user"></i>
</div>
</div>


</div>
</div>
</div>
</div>
<div id="OT_submitWrap" class="reservation-btn">
<input class="btn btn-default btn-lg btn-block" type="submit" value="Reserver" name="Ajouter" id="Ajouter">
</div>

<div class="OT_hidden">
<input type="hidden" class="OT_hidden" name="id_reservation" value="">
<input type="hidden" class="OT_hidden" name="idclient" value="7">

</div>
</form>
<noscript>&amp;lt;a href="http://www.omniture.com" title="Web Analytics"&amp;gt;&amp;lt;img src="http://o.opentable.com/b/ss/otrestref/1/H.22.1--NS/0" height="1" width="1" border="0" alt="" /&amp;gt;&amp;lt;/a&amp;gt;</noscript>

</div>
</div>
</div>
<div class="reservation-footer">
<p>Vous pouvez aussi appeler le: <strong>+216 53 821 350   </strong>Pour Réserver.</p>
<span></span>
 </div>
</div>
</section>



















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

<script src="js/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:58 GMT -->
</html>