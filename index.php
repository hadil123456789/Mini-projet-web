<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
  header("location:login.php");
  exit();
}
if (date("H") < 18)
  $bienvenue = "Bonjour et bienvenue " .
    $_SESSION["prenomNom"];
else
  $bienvenue = "Bonsoir et bienvenue " .
    $_SESSION["prenomNom"];
?>
<!doctype html>
<html lang="en">

<head>
  <title>SCO-ENICAR</title>
</head>

<body style="background-image: url('photo.jpg')" ><?php
      include("entete.html");
      ?>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-color: transparent">
      <div class="contrain">
        <h1 class="display-3" style="color :#031B88" > <?php echo $bienvenue ?></h1>
        <h3 style= "text-decoration: underline ; text-transform: lowercase ; color : #8A5082" >Bienvenue dans votre espace personnel de gestion de scolarité.</h3>
        <h3 style= "text-decoration: underline ;text-transform: lowercase ; color : #8A5082">Vous pouvez gérer vos classes ainsi que l'état d'absence.</h3>
        <p><a class="btn btn-primary btn-lg" href="affichage.php" style="background-color: transparent  ;color :#031B88 ; border: 2px solid #008CBA; border-radius: 12px;  " role="button">Mes Groupes &raquo;</a></p>
      </div>
    </div>

    <div class="container" align="center">
      <!-- Example row of columns -->
      <div class="row" id="section">
        <div class="col-md-4">
          <h2 style="color :#031B88">INFO1</h2>
          <p style="color : #8A5082">Vous pouvez gérer la classe INFO 1</p>
          <p><a class="btn btn-secondary" href="ajouterGroupe.php" style="background-color: transparent  ;color :#031B88 ; border: 2px solid #008CBA; border-radius: 12px;  "    role="button">Gérer les Groupes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2 style="color :#031B88">INFO2</h2>
          <p style="color : #8A5082">Vous pouvez gérer la classe INFO 2</p>
          <p><a class="btn btn-secondary" href="ajouterGroupe.php"  style="background-color: transparent  ;color :#031B88 ;border: 2px solid #008CBA; border-radius: 12px; " role="button">Gérer les Groupes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2 style="color :#031B88">INFO3</h2>
          <p style="color : #8A5082">Vous pouvez gérer la classe INFO 3</p>
          <p><a class="btn btn-secondary" href="ajouterGroupe.php"   style="background-color: transparent  ;color :#031B88 ;border: 2px solid #008CBA; border-radius: 12px; " role="button" >Gérer les Groupes &raquo;</a></p>
        </div>
      </div>
      <div class="container" align="center">
        <!-- Example row of columns -->
        <div class="row">
          

        </div> <!-- /container -->

  </main>


  <?php include('footer.html'); ?>




</body>

</html>
