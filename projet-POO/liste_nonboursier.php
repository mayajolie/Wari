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
  <title>Universite</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
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
            <a class="nav-link js-scroll" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="liste_etudiant.php">Etudiants</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="liste_boursier.php">Boursiers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="liste_nonboursier.php">Non Boursiers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="liste_loger.php">Logers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="liste.php">Recherche</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="post-box">
            <h3 class="title-left">
              Liste des Non_Boursiers
            </h3>
            
            <table id="example" class="table table-striped table-bordered"  >
              <thead>
                <tr>
                  <th>matricule</th>
                  <th>nom</th>
                  <th>prenom</th>
                  <th>date de naissance</th>
                  <th>telephone</th>
                  <th>adresse email</th>
                  <th>adresse</th>


                </tr>
              </thead>
              <tbody>
                <?php


                foreach ($etuService->findb() as $donnes) {

                  echo '<tr>
            <td>' . $donnes->matricule . '</td>
            <td>' . $donnes->nom_etudiant . '</td>
            <td>' . $donnes->prenom_etudiant . '</td>
            <td>' . $donnes->date_naiss . '</td>
            <td>' . $donnes->telephone . '</td>
            <td>' . $donnes->email . '</td>
            <td>' . $donnes->adresse . '</td>

            </tr>';
                }

                ?>
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
<script>

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>