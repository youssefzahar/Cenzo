<?php 
include  "../Model/Forum.php";
include  "../Controller/ForumC.php";
include  "../Model/Commentaire.php";
include  "../Controller/CommentaireC.php";
$forumC= new ForumC();

$commentaireC= new CommentaireC();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Afficher Forums
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

<body class="">
  <div class="wrapper ">
   <?php include'sidebar.php'  ?>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Liste Forums</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">

                <h4 class="card-title"> Gestion Forums</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Sujet Forum
                      </th>
                      <th>
                        Par
                      </th>
                      <th>
                        Commentaire
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Etat
                      </th>
                      <th>
                        Supprimer
                      </th>
                    </thead>
                    <tbody>
                    <?php
                    $res = $commentaireC->afficherCommentairesForum($_GET["id"]);
                    foreach($res as $row2){
                    ?>
                    <tr>
                    <?php
                    $resultaa = $forumC->afficherForumCom($row2["id_forum"]);
                    foreach($resultaa as $row3){
                    ?>
                    <td><?php echo $row3['sujet']; ?></td>
                    <?php
                    }
                    ?>
                    <td>               
                    <?php
                                            $resultaa = $forumC->affichernomprenom($row3["id_utilisateur"]);
                                            foreach($resultaa as $row4){
                                            ?>
                                            <?php echo $row4['nom']; ?> <?php echo $row4['prenom']; ?>
                                            <?php
                                            }
                                            ?>
                    </td>
                    <td><?php echo $row2['com']; ?></td>
                    <td><?php echo $row2['date']; ?></td>
                                                <td>
                                          <?php
                                            if($row2['etat']==1)
                                                {
                                                    ?>

                                                <form method="POST" action="NonApprouverCom.php?id=<?PHP echo $row2['id']; ?>&idf=<?php echo $_GET["id"] ?>">
                                                    <input type="submit" class="btn btn-success" value= "Approuver">
                                                </form>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                <form method="POST" action="ApprouverCom.php?id=<?PHP echo $row2['id']; ?>&idf=<?php echo $_GET["id"] ?>">
                                                    <input type="submit" class="btn btn-warning" value= "Non Approuver">
                                                </form>
                                                    <?php
                                                }
                                            ?>
                                            </td>
                                            <td>
                                               <form method="POST" action="SupprimerCommentaire.php?id=<?PHP echo $row2['id']; ?>&idf=<?php echo $_GET["id"] ?>">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                </form>
                                            </td>
                      </tr>
                      <?php
                                                }
                                            ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
      <script type = "text/javascript">
        $(document).ready(function(){
            load_data();
            function load_data(str)
            {
                $.ajax({
                    url:"ajaxForum.php",
                    method:"post",
                    data:{str:str},
                    success:function(data)
                    {
                        $('#tableau').html(data);
                    }
                });
            }

            $('#rech').keyup(function(){
                var recherche = $(this).val();
                if(recherche != '')
                {
                    load_data(recherche);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>

</body>

</html>