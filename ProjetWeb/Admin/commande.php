<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!-- --------------------------------------------------------- -->

<?php
require_once '../controller/ClientC.php';
require_once '../controller/MenuC.php';
require_once '../controller/commandeC.php';


$clientC = new ClientC();

$commandeC = new commandeC();
$commandes = $commandeC->afficherCommande();

if(isset($_POST['remove'])){
    $commandeC->setAnnule($_POST['idcommande']);
    header('Location: commande.php');
}


if(isset($_POST['delete'])){
    $commandeC->delete($_POST['idcommande']);
    header('Location: commande.php');
}


if(isset($_POST['confirme'])){
    $commandeC->setConfirme($_POST['idcommande']);
    header('Location: commande.php');
}


if((isset($_POST['sendmail']))&&(isset($_POST['mail']))&&(isset($_POST['message']))&&(isset($_POST['objet'])))
{
    $commandeC->sendMail(($_POST['mail']),($_POST['message']),($_POST['objet']));
    header('Location: commande.php');
}

?>
<!-- --------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        Now UI Dashboard by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet"/>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            <?php
            $nbproduit=$commandeC->calculercommandeproduit();
            $platsC= new MenuC();

            ?>
            var dataa=[];
            var Header= ['produit', 'Nombre Commande'];
            dataa.push(Header);
            <?php
            foreach ($nbproduit as $row){
            $p=$platsC->findproduit($row[0]);

            ?>
            dataa.push(['<?php echo $p["nom_plat"] ; ?>',<?php echo $row[1] ?>]);
            <?php
            }
            ?>
            var data = new google.visualization.arrayToDataTable(dataa);
            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                },
                bars: 'vertical' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="orange">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="commande.php">
                        <i class="now-ui-icons design_app"></i>
                        <p>Commande</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
       
       
        <!-- Navbar -->
       <?php include "sidebar.php"?>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- --------------------------------------------------------- -->



                            <h4 class="card-title"> commande Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        Client id
                                    </th>
                                    <th>
                                        Client name
                                    </th>
                                    <th>
                                        nombre Produit
                                    </th>
                                    <th>
                                        Total Prix
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Adresse
                                    </th>
                                    <th>
                                        Telephone
                                    </th>
                                    <th>
                                        Etat
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($commandes as $commande) {
                                        $client=$clientC->recupererClient2($commande['id_client']);
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $commande['id_client'] ?>
                                            </td>
                                            <td>
                                                <?php echo $client['nom'] ?>
                                            </td>
                                            <td>
                                                <?php echo $commande['nbrproduit'] ?>
                                            </td>
                                            <td>
                                                <?php echo $commande['totalprix'] ?> DT
                                            </td>
                                            <td >
                                                <?php echo $commande['date'] ?>
                                            </td>
                                            <td >
                                                <?php echo $commande['adresse'] ?>
                                            </td>
                                            <td >
                                                <?php echo $commande['numeroTelephone'] ?>
                                            </td>
                                            <td >
                                                <?php echo $commande['etat'] ?>
                                            </td>
                                            <td>

                                                <button type="submit" rel="tooltip" title=""  class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" data-toggle="modal" data-target="#exampleModalCenter">
                                                    <i class="now-ui-icons ui-1_email-85"></i>
                                                </button>
                                                <form method="POST">
                                                    <button type="submit" rel="tooltip" title="" name="confirme" class="btn btn-success btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="confirme">
                                                        <i class="now-ui-icons ui-1_check"></i>
                                                    </button>
                                                    <button type="submit" rel="tooltip" title="" name="remove" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                                    </button>
                                                    <button type="submit" rel="tooltip" title="" name="delete" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Delete">
                                                        <i class="now-ui-icons ui-1_simple-delete"></i>
                                                    </button>

                                                    <input name="idcommande" value=" <?php echo $commande['id'] ?>" hidden>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="commandedetails.php?idcommande=<?php echo $commande['id'] ?>"  >
                                                    details
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <!-- --------------------------------------------------------- -->

                                    </tbody>
                                </table>
                                <a href="generate_pdf.php" input type="submit" class="btn btn-outline-success btn-lg " value="export" name="export "   >exporter en pdf</a>

                            </div>
                        </div>
                    </div>
                    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
                </div>

            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Mail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>




                    <form method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">À</label>
                                <input type="email" id="mail" name="mail" placeholder="destinataire" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Objet</label>
                                <input type="text" id="objet" name="objet" class="form-control" placeholder="Objet" >
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message</label>
                                <textarea type="number" id="message" name="message" class="form-control" id="recipient-name"> </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="sendmail" class="btn btn-primary">Envoyer Mail</button>
                        </div>
                    </form>
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
                    &copy;
                    <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>
                    , Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a
                            href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
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
<script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>
</body>

</html>
