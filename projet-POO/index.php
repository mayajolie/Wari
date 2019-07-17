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

  <!--/ Nav Star /-->
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




  <!--/ Section Contact-Footer Star /-->


  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-mf">
            <div id="about" class="box-shadow-full">
              <div class="row">
                <div class="col-lg-12">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Inscris Un Nouveau Etudiant!
                    </h5>
                  </div>
                  <div>
                    <div id="form">
                      <form action="" method="POST" class="bs-example">
                        <div>

                          <p>
                            <span class="input-group-text">Nom</span>
                            <input type="text" name="nom" class="form-control input-mf" required/>
                          </p>
                          <p>
                            <span class="input-group-text">Prenom</span>
                            <input type="text" name="prenom" class="form-control input-mf" required />
                          </p>
                          <p>
                            <span class="input-group-text">Date de Naissance</span>
                            <input type="date" name="date_naiss" class="form-control input-mf" placeholder="Date de Naissance" required />
                          </p>
                          <p>
                            <span class="input-group-text">Telephone</span>
                            <input type="number" name="tel" class="form-control input-mf" />
                          </p>
                          <p>
                            <span class="input-group-text">Email</span>
                            <input type="email" name="email" class="form-control input-mf" placeholder="@" />
                          </p>

                          <div class="row">
                            <div class="col-md-6">
                              <label for="">Boursier</label>
                              <input type="radio" id="b" name="boursier" value="boursier">
                              <div id="idbourse">
                                <label for="">Type de bourse</label>
                                <select name="type" class="form-control" id="">
                                  <option value="">---</option>

                                  <?php
                                  $etuService = new Etudiant_Service($db);
                                  foreach ($etuService->findAll("Types") as $value) {
                                    echo " <option value=$value->id_type >$value->libelle</option>";
                                  }

                                  ?>
                                </select>
                              </div>

                              <p>
                                <div id="lnl">
                                  <input type="radio" id="nl" name="loger" value="loger">
                                  <label for="">Non Loger </label>
                                  <input type="radio" id="l" name="loger" value="nologer" placeholder="etes vous boursier">
                                  <label for="">Loger </label>
                                </div>


                                <div id="idloger">
                                  <p>
                                    <label for="">Chambre</label>
                                    <select name="typech" class="form-control input-mf" id="">
                                      <option value="">---</option>
                                      <?php
                                      $etuService = new Etudiant_Service($db);
                                      foreach ($etuService->findAll("Chambres") as $value) {
                                        echo " <option value=$value->id_chambre >$value->id_chambre</option>";
                                      }
                                      ?>
                                    </select>
                                  </p>
                                  <p>
                                    <label for="">Batiments</label>
                                    <select name="bat" class="form-control input-mf" id="">
                                      <option value="">---</option>
                                      <?php
                                      $etuService = new Etudiant_Service($db);
                                      foreach ($etuService->findAll("Batiments") as $value) {
                                        echo " <option value=$value->id_batiment >$value->nom_batiment</option>";
                                      }
                                      ?>
                                    </select>
                                  </p>
                                </div>
                              </p>
                            </div>
                            <div class="col-md-6">
                              <div id="nobr">
                                <label for="">Non boursier</label>
                                <input type="radio" id="nb" name="boursier" value="nonboursier">
                              </div>
                              <div id="idnobourse">
                                <input type="text" name="adresse" id="titre" class="form-control" placeholder="Entrer votre adress">
                              </div>
                            </div>
                          </div>



                          <p>
                            <button type="submit" class="button button-a button-big button-rouded" name="ajouter">Ajouter</button>
                          </p>

                        </div>
                      </form>
                    </div>


                    <?php
                    if (isset($_POST['ajouter'])) {
                      $nom = $_POST['nom'];
                      $prenom = $_POST['prenom'];
                      $date = $_POST['date_naiss'];
                      $tel = $_POST['tel'];
                      $email = $_POST['email'];
                      $type = $_POST['type'];
                      $chambre = $_POST['typech'];
                      $adress = $_POST['adresse'];
                      $matricule = rand(0, 100000000);

                      
                      if (!empty($adress)) {
                        $etudiant = new Etudiant_NonBoursier($matricule,$nom,$prenom,$date,$tel,$email,$adress);
                        $etuService->add($etudiant);

                      } elseif (!empty($type) && empty($chambre)) {
                        $etudiant = new Etudiant_Boursier($matricule,$nom,$prenom,$date,$tel,$email,$type);
                        $etuService->add($etudiant);

                      } else {
                        $etudiant = new Etudiant_Loge($matricule,$nom,$prenom,$date,$tel,$email,$type,$chambre);
                        $etuService->add($etudiant);
                      }
                    
                    }

                    ?>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="copyright-box">
                <p class="copyright">&copy; Copyright <strong>Jolie@Mariama95</strong>.Sonatel Academy</p>
                <div class="credits">
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
  </section>


  <!--/ Section Blog Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Listes
            </h3>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-5 align-items-center">
          <div class="card card-blog">
            <div class="card-img">
              <a href="liste_etudiant.php"><img src="img/post-3.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <form action="liste_etudiant.php" method="post">
                  <input type="submit" name="etudiant" value="Etudiant" class="button button-a button-big button-rouded">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 ">
          <div class="card card-blog">
            <div class="card-img">
              <a href="liste_boursier.php"><img src="img/post.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <form action="liste_boursier.php" method="post">
                  <input type="submit" name="boursier" value="Boursiers" class="button button-a button-big button-rouded">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <div class="card card-blog">
            <div class="card-img">
              <a href="liste_nonboursier.php"> <img src="img/post2.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <form action="liste_nonboursier.php" method="post">
                  <input type="submit" name="noboursier" value="Non Boursiers" class="button button-a button-big button-rouded">
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card card-blog">
            <div class="card-img">
              <a href="liste_loger.php"><img src="img/loger.jpg" alt="" class="img-fluid"></a>
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <form action="liste_loger.php" method="post">
                  <input type="submit" name="loger" value="Loger" class="button button-a button-big button-rouded">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="testimonials paralax-mf bg-image">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Jolie@Mariama95</strong>.Sonatel Academy</p>
              <div class="credits">
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>


  </section>
  <!--/ Section Blog End /-->
  <!--/ Intro Skew End /-->
  <!--/ Section Testimonials Star /-->

  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>Joile@Mariama95</strong>.Sonatel Academy</p>
              <div class="credits">
                Designed by JuniorLaye07
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>

  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <script src="test.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>


</html>