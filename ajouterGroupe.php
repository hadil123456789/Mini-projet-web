# Mini-projet-web
Hadil bouneb et feriel lamirem
<?php include("connexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  

  <style>
    .erreur {
      color: red;
      text-align: center;
    }
  </style>
</head>

<body style="background-image: url('photo.jpg')">
  <?php
  include("entete.html");
  ?>


  <main role="main">
    <div class="jumbotron" style="background-color: transparent">
      <div class="container">
        <h1 style="color :#031B88" class="display-4">Ajouter un groupe</h1>
        <h3 style=" color : #8A5082">Remplir le formulaire ci-dessous afin d'ajouter un groupe!</h3>
      </div>
    </div>


    <div class="container">
      <?php
      $erreur = "";
      if ($_SESSION["autoriser"] != "oui") {
        header("location:login.php");
        exit();
      } else {
        if (isset($_POST['ajouter'])) {
          $nom = trim($_POST['nomGroupe']);
          $sel = $pdo->prepare("select name_classe from classe where name_classe=?");
          $sel->execute(array($nom));
          $tab = $sel->fetchAll();
          if (count($tab) > 0)
            $erreur = "NOT OK"; // Etudiant existe déja
          else {
            $sql = "INSERT INTO classe (name_classe) values (:name)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
              ':name' => $nom,
            ]);
            $erreur = "Ajout effectué";
          }
        }
      }
      ?>

      <form id="myform" method="POST" action="ajouterGroupe.php">
        <!--Nom-->
        <!-- <div class="alert alert-primary" role="alert">
        
        </div> -->
        <div class="form-group">
          <label for="nom"> <h3 style=" color : #031B88">Nom de Groupe:</h3></label><br>
          <input type="text" id="nom" name="nomGroupe" class="form-control" required autofocus>
        </div>
        <div class="erreur"><?php echo $erreur ?></div>
        <!--Bouton Ajouter-->
        <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Ajouter</button>
      </form>

    </div>
  </main>


  <?php
  include("footer.html");
  ?>

  <script src="./assets/dist/js/inscrire.js"></script>
</body>

</html>
