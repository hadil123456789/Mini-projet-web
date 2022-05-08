# Mini-projet-web
Hadil bouneb et feriel lamirem
   
<?php include("connexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body onload="refrech()" style="background-image: url('photo.jpg')">
  <?php
  include("entete.html");
  ?>

  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
    <button class="btn btn-outline-success my-2 my-sm-0" style="background-color: transparent  ; color : #031B88 ;border: 2px solid #031B88; border-radius: 12px; " type="submit">Chercher Groupe</button>
  </form>
  </div>
  </nav>

  <main role="main">
    <div class="jumbotron" style="background-color: transparent">
      <div class="container">
        <h1 class="display-4" style="color :#031B88">Afficher la liste d'étudiants par groupe</h1>
        <h3 style=" color : #8A5082">Cliquer sur la liste afin de choisir une classe!</h3>
      </div>
    </div>

    <div class="container">
      <form action="" method="POST" >
        <div class="form-group">
          <label style="color :#031B88" for="classe"> <h3>Choisir une classe: </3></label><br>
          <!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->

          <select id="classe" name="classe" style="border: 2px solid blue; border-radius: 5px" class="custom-select custom-select-sm custom-select-lg">
            <?php
            $sql0 = "SELECT * FROM classe";
            $stmt0 = $pdo->prepare($sql0);
            $stmt0->execute();
            while ($cats = $stmt0->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $cats['name_classe']; ?>">
                <?php echo $cats['name_classe']; ?>
              </option>
            <?php }
            ?>
          </select>
          <br>
          <br>
          <button type="submit" style="background-color: transparent  ; color : #031B88 ;border: 2px solid #031B88; border-radius: 12px; " name="afficherpar">afficher</button>
        </div>
      </form>
    </div>




    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="border: 2px solid blue; border-radius: 5px">
            <!--Ligne Entete-->

            <tr style="border: 2px solid blue; border-radius: 5px">
              <th  style="color :#031B88">
                CIN
              </th>
              <th  style="color :#031B88">
                Nom
              </th>
              <th  style="color :#031B88">
                Prénom
              </th>
              <th  style="color :#031B88">
                Email
              </th>
              <th  style="color :#031B88">
                Classe
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php

            if ($_SESSION["autoriser"] != "oui") {
              header("location:login.php");
              exit();
            } else {
              if (isset($_POST['afficherpar'])) {
                $classe = $_POST['classe'];
                $sql = "SELECT * from etudiant where Classe = :classe";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                  ':classe' => $classe,
                ]);
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
              }
            }
            ?>
          </table>
          <br>
        </div>
        <button type="button" onclick="refresh()" style="background-color: transparent  ; color : #031B88 ;border: 2px solid #031B88; border-radius: 12px; " class="btn btn-primary btn-block active">Actualiser</button>
      </div>
    </div>
  </main>

  <?php
  include("footer.html");
  ?>


</body>

</html>
