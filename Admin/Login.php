<?php
session_start();

if(isset($_SESSION['login']))
{

    header("location: index.php");
}
include "../Model/admin.php";
include "../Controller/AdminC.php";

    if(isset($_POST['Connexion']))
   {
    $email=$_POST["email"];
    $adminC = new AdminC();

   $liste=$adminC->recupereremail($email);

   //var_dump($res);
    foreach($liste as $row){
      $mdp=$row['mdp'];
    }
    if (password_verify($_POST["password"],$mdp))
    {
    $adminC->ajouterAdminDernieracc($email);
    $liste=$adminC->recupereremail($email);
     foreach($liste as $row){
      $id=$row['id'];
      $nom=$row['nom'];
      $email=$row['email'];
      $tel=$row['tel'];
      $image=$row['image'];
      $dernier_acc=$row['dernier_acc'];
    }

         $_SESSION['id'] = $id;
         $_SESSION['login'] = $email;
         $_SESSION['nom'] = $nom;
         $_SESSION['tel'] = $tel;
         $_SESSION['image'] = $image;
         $_SESSION['dernier_acc'] = $dernier_acc;

         header("location: index.php");

    }
   else
   {
             header("location: Login.php");
   }
}
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body >
  <div >
    <div>
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Login</h5>
              </div>
              <div class="card-body">
                <form method="post">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                      </div>
                    </div>
                  </div>
                    <input type="submit" class="btn btn-block btn-warning" value="Connexion" name="Connexion">
                </form>
                <p class="text-right"><a href="RecupererMdpAdmin.php" class="text-warning forgot_color" style="color: white">Mot de passe oublié ?</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
      </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>