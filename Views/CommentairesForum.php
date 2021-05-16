<?php 
include  "../Model/Forum.php";
include  "../Controller/ForumC.php";
include  "../Model/Commentaire.php";
include  "../Controller/CommentaireC.php";

session_start();

$forumC= new ForumC();
$resultat=$forumC->afficherForumCom($_GET["id"]);

$commentaireC= new CommentaireC();
$nbcom=$commentaireC->CountCommentaireid_forum($_GET["id"]);

foreach($resultat as $row){
$id=$row['id'];
$categorie=$row['categorie'];
$id_utilisateur=$row['id_utilisateur'];
$sujet=$row['sujet'];
$description=$row['description'];

}


if($_POST['Ajouter'])
{
    if($_POST['commentaireClient']!=""){
        $coment=new Commentaire($_GET["id"],$_SESSION['idclient'],$_POST['commentaireClient']);
        $commentaireC->ajouterCommentaire($coment);
        header("Location:  ".$_SERVER['PHP_SELF']."?id=".$_GET["id"]);
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/blog_single_slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:48 GMT -->
<head>
<meta charset="utf-8">
<title>Forum</title>
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
<h2 class="text-uppercase">Blog</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<div class="blog-content">
<div class="container">
<div class="row">
<div class="col-md-9">
<article>
<div class="post-img">
<div class="blog-slider">
<div>
<img src="img/blog/1.jpg" class="img-responsive" alt="" />
</div>
<div>
<img src="img/blog/2.jpg" class="img-responsive" alt="" />
</div>
<div>
<img src="img/blog/3.jpg" class="img-responsive" alt="" />
</div>
</div>
<div class="post-format"><i class="fa fa-picture-o"></i></div>
</div>

<article class="wow fadeInUp">
<div class="row">
<div class="col-md-7 col-sm-7">
<h4><a href="CommentairesForum.php?id=<?php echo $row['id']; ?>"><?php echo $row['sujet']; ?></a></h4>
</div>
<div class="col-md-5 col-sm-5">
<div class="post-date"><?php echo $row['date_creation']; ?>, <?php echo $nbcom; ?> Comment(s)</div>
</div>
</div>
<hr>
<p>description</p>
</article>

<div class="comments-area">
<h3><?php echo $nbcom; ?> Comments</h3>
<ul class="commentlist">

                <?php
                $res = $commentaireC->afficherCommentaireid_forum($_GET["id"]);
                foreach($res as $row1){

                ?>
 <li>
<div class="comment">

<?php
				$resultaa = $forumC->affichernomprenom($row["id_utilisateur"]);
				foreach($resultaa as $row2){
				?>	
<span class="comment-image">
<img alt="avatar image" src="<?php echo $row2['image']; ?>" class="avatar" height="70" width="70">
</span>
<span class="comment-info d-text-c">
<span><?php echo $row1['date']; ?> &nbsp;  &nbsp; </span> <?php echo $row2['nom']; ?> <?php echo $row2['prenom']; ?>
</span>
				<?php
				}
				?>
<p><?php echo $row1['com']; ?> </p>
                <?php
                if($row1['id_utilisateur'] == $_SESSION['idclient'])
                {
                    ?>
                    <a href="ModifierCommentaire.php?id=<?php echo $row1['id']; ?>&idf=<?php echo $_GET["id"]; ?>">Modifier</a>
                    <a href="SupprimerCommentaire.php?id=<?php echo $row1['id']; ?>&idf=<?php echo $_GET["id"]; ?>">Supprimer</a>
                    <?php
                }
                ?>
</div>
</li>
                <?php
                }
                ?>




</ul>
<?php
if(isset($_SESSION['idclient']))
{
	?>
<div id="respond" class="comment-respond">
<h3>Laisser un Commentaire</h3>
<form method="post" class="comment-form">
<div class="row">
<div class="col-md-12">
<textarea placeholder="Votre Commentaire" name="commentaireClient"></textarea>
</div>
<div class="col-md-12">
<input type="submit" class="btn btn-default btn-block" value="Ajouter Commentaire" name="Ajouter" >
</div>
</div>
</form>
</div>
<?
}
else
{
	?>
<h3>Connecter vous pour Commenter</h3>

	<?php
}
?>

</div>
</article>
</div>
</div>
</div>
</div>

<section class="subscribe">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Subscribe</h1>
<p>Get updates about new dishes and upcoming events</p>
<form class="form-inline" action="https://demo.web3canvas.com/themeforest/tomato/php/subscribe.php" id="invite" method="POST">
<div class="form-group">
<input class="e-mail form-control" name="email" id="address" type="email" placeholder="Your Email Address" required>
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
<p>Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.Duis leo justo, condimentum at purus eu, posuere pretium tellus.</p>
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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f784828787988583b785928483968285969983d994989a">[email&#160;protected]</a></p>
</div>
</div>
</div>
</div>

<div class="footer-copyrights">
<div class="container">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-copyright"></i> 2015.Tomato.All rights reserved. Designed with <i class="fa fa-heart primary-color"></i> by Surjithctly</p>
</div>
</div>
</div>
</div>
</section>
</div>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/blog_single_slider.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 14:18:48 GMT -->
</html>
