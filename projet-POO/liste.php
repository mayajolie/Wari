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
  <title>DevFolio Bootstrap Template</title>
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
  <!--/ Nav Star /-->
  <div class="container">
  <a class="navbar-brand js-scroll" href="#page-top">Sonatel Academy</a>

  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
     
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a  href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a  href="liste_etudiant.php">Etudiants</a>
          </li>
          <li class="nav-item">
            <a href="liste_boursier.php">Boursiers</a>
          </li>
          <li class="nav-item">
            <a  href="liste_nonboursier.php">Non Boursiers</a>
          </li>
          <li class="nav-item">
            <a href="liste_loger.php">Logers</a>
          </li>
          <li class="nav-item">
            <a  href="liste.php">Recherche</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
  <!--/ Nav End /-->


  <section class="blog-wrapper sect-pt4" id="recherche" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="widget-sidebar sidebar-search">
            <h2><strong  class="sidebar-title">Statuts:</strong></h2>
            <div class="sidebar-content">
        <div class="container admin">
            <div class="row">
              <form class="form-signin" action="liste.php#recherche" method="Post">
               <div class="input-group form-group">
                 <input type="text" id="inputNumber" class="form-control" aria-label="Search for..." placeholder="Matricule" name="Matricule" >
                 <input  name="recherche" class="btn btn-secondary btn-search" type="submit" value="Rechercher">
               </div>
              </form>
            <?php 
                      
                     
                     
                         $db = new PDO('mysql:host=127.0.0.1;dbname=Universite', 'root', 'Zawji@2801');
                         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                         $etuService = new Etudiant_Service($db);

                        if(isset($_POST["recherche"])){
                          $Mat=$_POST["Matricule"];
                        //verification matricule
                        $reque= $db->query("SELECT * FROM Etudiant WHERE matricule='".$Mat."'"); 
                        while($donnes=$reque->fetch()){
                          $idEtudiant=$donnes['id_etudiant'];
                        }
                         
//============================================================================
                        $requetlog=$db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,libelle ,Logers.id_chambre,nom_batiment FROM Etudiant,Logers,Chambres,Batiments,Boursiers,Types WHERE Logers.id_etudiant='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'  AND Batiments.id_batiment=Chambres.id_batiment AND Logers.id_chambre=Chambres.id_chambre AND Boursiers.id_type=Types.id_type");
                        $requetlog->execute();
                       
                          
                        if ( $requetlog->execute()==true ) {
            
                          while($apprenant=$requetlog->fetch()){
                              ?>
                         </table>    
                         <table class="table table-striped table-bordered" >
               
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                            <th>NºChambres</th>
                            <th>Batiments</th>
                          </thead>
                           
                          <?php
                        echo'<tr>
                        
                         <td>'. $apprenant['matricule'].'</td>
                         <td>'. $apprenant['nom_etudiant'].'</td>
                         <td>'. $apprenant['prenom_etudiant'].'</td>
                         <td>'. $apprenant['date_naiss'].'</td>
                         <td>'. $apprenant['telephone'].'</td>
                         <td>'. $apprenant['email'].'</td>
                         <td>'. $apprenant['libelle'].'</td>
                         <td>'. $apprenant['id_chambre'].'</td> 
                         <td>'. $apprenant['nom_batiment'].'</td> ';
                             
                          break;
                          }
                        }
                      

//=========================================================================
                     
                      
                        $requetb= $db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,libelle FROM Etudiant,Boursiers,Types  where Boursiers.id_type=Types.id_Type  AND Boursiers.id_etudiant ='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'  ");
                        $requetb->execute();
                           while($apprenant=$requetb->fetch()){
                             ?>
                         <table id="Boursiers"class="table table-striped table-bordered" >
               
                          <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Bourses</th>
                          </thead>
                           
                           <?php
                            
                           echo'<tr>
                        
                           <td>'. $apprenant['matricule'].'</td>
                           <td>'. $apprenant['nom_etudiant'].'</td>
                           <td>'. $apprenant['prenom_etudiant'].'</td>
                           <td>'. $apprenant['date_naiss'].'</td>
                           <td>'. $apprenant['telephone'].'</td>
                           <td>'. $apprenant['email'].'</td>
                           <td>'. $apprenant['libelle'].'</td>';
                          break;
                          } 
                        
                      
//=========================================================================================
                        $requetnob=$db->query("SELECT matricule,nom_etudiant,prenom_etudiant,date_naiss,telephone,email,adresse,adresse FROM Etudiant,Non_boursiers WHERE  Non_boursiers.id_etudiant='".$idEtudiant."' AND Etudiant.id_etudiant='".$idEtudiant."'");
                          while($apprenant=$requetnob->fetch()){
                              ?>
                        </table> 
                             <table  class="table table-striped table-bordered" >
                              <thead >  
                             <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Date_naissance</th>
                            <th>Adresse</th>
                             </tr>
                          </thead>
                             <?php
                          
                        echo'<tr>
                        
                        <td>'. $apprenant['matricule'].'</td>
                        <td>'. $apprenant['nom_etudiant'].'</td>
                        <td>'. $apprenant['prenom_etudiant'].'</td>
                        <td>'. $apprenant['date_naiss'].'</td>
                        <td>'. $apprenant['telephone'].'</td>
                        <td>'. $apprenant['email'].'</td>
                          <td>'. $apprenant['adresse'].'</td> 
                          </tr>';

                   
                          }
//===========================================================================================
                        }
                          ?>
                          </table>
                           <?php
                    ?>
              </div>
        </div>
   

          </div>
        </div>
      </div>
    </div>  <script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
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

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>