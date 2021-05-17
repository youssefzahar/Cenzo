<!-- --------------------------------------------------------- -->

<?php
session_start();
include "../config.php";
require_once '../controller/commandeC.php';
require_once '../controller/ligneCommandeC.php';
require_once '../model/commande.php';
require_once '../model/ligneCommande.php';


$_SESSION['foods'] = !isset($_SESSION['foods']) ? array() : $_SESSION['foods'];
// if session food existe => session food else : array  
$_SESSION['sum'] = !isset($_SESSION['sum']) ? 0 : $_SESSION['sum'];


if (isset($_POST['emptycart'])) {
    $_SESSION['foods'] = array();
    $_SESSION['sum'] = 0;
    header('Location: shop_cart.php');
}

if (isset($_POST['sumbitcommande'])) {
        if(($_POST['adresse']!="")&&($_POST['numero']!="")){

        $q = 0;
        foreach ($_SESSION['foods'] as $f) {
            $q += $f->quantity;

        }

        $idc = time();//id unique :
        $commande = new commande($idc, $_SESSION['idclient'], $q, $_SESSION['sum'], date("Y/m/d"), "en cours de validation",$_POST['adresse'],$_POST['numero']);
        $commandeC = new commandeC();
        $commandeC->ajouterCommande($commande);

        foreach ($_SESSION['foods'] as $f) {

            $ligneCommande = new LigneCommande($idc, $f->id, $f->quantity, $f->price);
            $ligneCommandeC = new LigneCommandeC();
            $ligneCommandeC->ajouterLigneCommande($ligneCommande);

        }
        unset($_SESSION['foods']);
        unset($_SESSION['sum']);

        
        header('Location: shop_fullwidth.php');
    }
}

?>
<script>
    function verif(){

        var adresse = document.getElementById("adresse").value;
        var numero = document.getElementById("numero").value;

        if( adresse.length === 0  ){
            alert("adresse obligatoire");
        }
        if( numero.length === 0  ){
            alert("numero obligatoire");
        }
    }

</script>


<!-- --------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:57 GMT -->
<head>
    <meta charset="utf-8">
    <title>Tomato Responsive Restaurant HTML5 Template</title>
    <meta name="author" content="Surjith S M">

    <meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
    <meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

    <script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">

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
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="preloder animated">
    <div class="scoket">
        <img src="img/preloader.svg" alt=""/>
    </div>
</div>
<div class="body">
    <div class="main-wrapper">

        <?php include 'navbar.php' ?>

        <section class="page_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase">Cart</h2>
                        <p>Checkout or add some items to your cart</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="shop-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- --------------------------------------------------------- -->

                        <table class="cart-table table table-bordered">
                            <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($_SESSION['foods'] as $f) { ?>
                                <tr>
                                    <td>
                                        <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>
                                        <a href="shop_single_full.html"><img src="img/shop/1.png" alt="" height="90"
                                                                             width="90"></a>
                                    </td>
                                    <td>
                                        <a href="shop_single_full.html"><?= $f->name ?></a>
                                    </td>
                                    <td>
                                        <span class="amount"><?= $f->price ?> TND</span>
                                    </td>
                                    <td>
                                        <div class="quantity"><?= $f->quantity ?></div>
                                    </td>
                                    <td>
                                        <span class="amount"><?= $f->quantity * $f->price ?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- --------------------------------------------------------- -->

                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="col-md-6">
                                        <div class="coupon form-group">
                                            <label>Coupon:</label>
                                            <br>
                                            <input placeholder="Coupon code" class="form-control" type="text">
                                            <button type="submit">Apply</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cart-btn">

                                    <form method="post">
                                            <button class="btn btn-danger" name="emptycart" type="submit">Empty the
                                                cart
                                            </button>

                                    </form>
                                            <?php if (isset($_SESSION['idclient'])) {
                                                ?>
                                                <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#exampleModalCenter">Checkout
                                                </button>
                                                <?php
                                            } else { ?>

                                               <a href="Connexion.php"> <button class="btn btn-success" >Checkout
                                                   </button> </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="cart_totals">
                            <div class="col-md-6 push-md-6 no-padding">
                                <h4 class="text-left">Cart Totals</h4>
                                <br>
                                <table class="table table-bordered col-md-6">
                                    <tbody>
                                    <!-- --------------------------------------------------------- -->

                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount"><?= $_SESSION['sum'] ?> TND</span></td>
                                    </tr>
                                    <tr>
                                        <th>Shipping and Handling</th>
                                        <td>
                                            Free Shipping
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td><strong><span class="amount"><?= $_SESSION['sum'] ?> TND</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!-- --------------------------------------------------------- -->

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Subscribe</h1>
                        <p>Get updates about new dishes and upcoming events</p>
                        <form class="form-inline"
                              action="https://demo.web3canvas.com/themeforest/tomato/php/subscribe.php" id="invite"
                              method="POST">
                            <div class="form-group">
                                <input class="e-mail form-control" name="email" id="address" type="email"
                                       placeholder="Your Email Address" required>
                            </div>
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-angle-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h1>About us</h1>
                        <p>Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor
                            vitae egestas et, accumsan quis nunc.Duis leo justo, condimentum at purus eu, posuere
                            pretium tellus.</p>
                        <a href="about.html">Read more &rarr;</a>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <h1>Recent post</h1>
                        <div class="footer-blog clearfix">
                            <a href="blog_right_sidebar.html">
                                <img src="img/thumb8.png" class="img-responsive footer-photo" alt="blog photos">
                                <p class="footer-blog-text">Hand picked ingredients for our best customers</p>
                                <p class="footer-blog-date">29 may 2015</p>
                            </a>
                        </div>
                        <div class="footer-blog clearfix last">
                            <a href="blog_right_sidebar.html">
                                <img src="img/thumb9.png" class="img-responsive footer-photo" alt="blog photos">
                                <p class="footer-blog-text">Daily special foods that you will going to love</p>
                                <p class="footer-blog-date">29 may 2015</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4  col-sm-6">
                        <h1>Reach us</h1>
                        <div class="footer-social-icons">
                            <a href="https://www.facebook.com/">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="https://www.twitter.com/">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://plus.google.com/">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="https://www.youtube.com/">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                            <a href="https://www.vimeo.com/">
                                <i class="fa fa-vimeo"></i>
                            </a>
                            <a href="https://www.pinterest.com/">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                            <a href="http://www.linkedin.com/">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="footer-address">
                            <p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
                            <p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
                            <p><i class="fa fa-envelope-o"></i><a
                                        href="https://demo.web3canvas.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="473432373728353307352234332632352629336924282a">[email&#160;protected]</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-copyrights">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p><i class="fa fa-copyright"></i> 2015.Tomato.All rights reserved. Designed with <i
                                        class="fa fa-heart primary-color"></i> by Surjithctly</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" onsubmit="return verif();" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">numero de telephone</label>
                        <input type="number" id="numero" name="numero" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="sumbitcommande" class="btn btn-primary">CHECK OUT</button>
                </div>
            </form>
        </div>
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


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/vendor/jquery-1.11.2.min.js"></script>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:57 GMT -->
</html>
