# Mini-projet-web
Hadil bouneb et feriel lamirem
<?php
require_once("connexion.php");
session_start();
if ($_SESSION["autoriser"] != "oui") {
  header("location:login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>


</head>

<body style="background-image: url('photo.jpg')"; >






  <?php include("entete.html"); ?>

  <main role="main">
    <div class="jumbotron" style="background-color: transparent" >
      <div class="container">
        <h1 class="display-4"  style="color :#031B88" >Liste des étudiants</h1>
        <h3  style=" color : #8A5082">Cliquer sur le bouton afin d'actualiser la liste!</h3>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="border: 2px solid blue; border-radius: 5px">
            <!--Ligne Entete-->

            <tr style="border: 2px solid blue; border-radius: 5px">
              <th style="color :#031B88">
                CIN
              </th>
              <th style="color :#031B88">
                Nom
              </th>
              <th style="color :#031B88">
                Prénom
              </th>
              <th style="color :#031B88">
                Email
              </th>
              <th style="color :#031B88"> 
                Classe
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php



            $sql = "SELECT * from etudiant";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($etudiants = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $cin = $etudiants['cin'];
              $nom = $etudiants['nom'];
              $prenom = $etudiants['prenom'];
              $email = $etudiants['email'];
              $classe = $etudiants['Classe'];
            ?>
              <tr>
                <td style="color :#031B88">
                  <?php echo $cin ?>
                </td>
                <td style="color :#031B88">                
                  <?php echo $nom ?>
                </td>
                <td style="color :#031B88">
                  <?php echo $prenom ?>
                </td>
                <td style="color :#031B88">
                  <?php echo $email ?>
                </td>
                <td style="color :#031B88">
                  <?php echo $classe ?>
                </td>
              </tr>

            <?php
            }
            ?>
          </table>
          <br>
        </div>
        <button type="button"   style="background-color: transparent  ; color : #031B88 ;border: 2px solid #031B88; border-radius: 12px; " onload="refresh()" class="btn btn-primary btn-block active">Actualiser</button>
      </div>
    </div>

  </main>


  <?php
  include("footer.html");
  ?>



</body>

</html>
