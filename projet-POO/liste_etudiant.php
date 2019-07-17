<?php
function chargerClass($classe)
{
  require $classe . ".php";
}
spl_autoload_register('chargerClass');
$db = new PDO('mysql:host=127.0.0.1;dbname=Universite', 'root', 'Zawji@2801');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$etuService = new Etudiant_Service($db);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Université</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">


  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="page-top">

  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">sonatel academy</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="#home">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#about">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#blog">Liste des Etudiants</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/intro.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">Coding for better life</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Service Apprenant,Inscription,Liste Etudiants,Boursiers,Non Boursiers,Recherche</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Nav Star /-->
  
    <div class="container" >
      <div class="row">
        <div class="col-md-12">
          <div class="post-box">
            <h3 class="title-left">
              Liste des Etudiants
            </h3>
            
            <table id="example" class="table table-striped table-bordered" tyle="width:100%" >
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                </tr>
              </thead>
              <tbody>
                <?php
               

                foreach ($etuService->findAll("Etudiant") as $donnes) {

                  echo '<tr>
                 <td>' . $donnes->matricule . '</td>
                 <td>' . $donnes->nom_etudiant . '</td>
                 <td>' . $donnes->prenom_etudiant . '</td>
                 <td>' . $donnes->date_naiss . '</td>
                 <td>' . $donnes->telephone . '</td>
                 <td>' . $donnes->email . '</td>
                 </tr>';
                }
                ?>
              </tbody>
            </table>  
            <script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>

          </div>
        </div>
      </div>
    </div>