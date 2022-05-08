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

<body style="background-image: url('photo.jpg')">
  <?php
  include("entete.html");
  ?>

  <main role="main">
    <div class="jumbotron" style="background-color: transparent">
      <div class="container">
        <h1 style="color :#031B88" class="display-4">Supprimer un groupe</h1>
        <h3 style=" color : #8A5082">Cliquer sur le bouton afin d'actualiser la liste!</h3>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="border: 2px solid blue; border-radius: 5px">
            <!--Ligne Entete-->

            <tr style="border: 2px solid blue; border-radius: 5px">
              <th style="color :#031B88" >
                ID
              </th>
              <th style="color :#031B88">
                Nom
              </th>
              <th style="color :#031B88">
                Supprimer
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php



            $sql = "SELECT * from classe";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($groupes = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $id = $groupes['id_groupe'];
              $groupe_name = $groupes['name_classe'];

            ?>
              <tr>
                <td style="color :#031B88">
                  <?php echo $id ?>
                </td>
                <td style="color :#031B88">
                  <?php echo $groupe_name ?>
                </td>
                <td style="color :#031B88">
                  <?php
                  if (isset($_POST['delete-delete-groupe'])) {
                    $sql = "DELETE FROM classe WHERE id_groupe = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                      ':id' => $_POST['id'],
                    ]);
                    //  header("Location: supprimerEtudiant.php");
                  }
                  ?>

                  <form action="supprimerGroupe.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <button name="delete-delete-groupe" class="btn btn-danger">Supprimer</button>
                  </form>

                </td>
              </tr>

            <?php
            }
            ?>
          </table>
          <br>
        </div>
        <a href="supprimerGroupe.php" class="button" style="vertical-align:middle ;background-color: transparent  ;color :#031B88 ; border: 2px solid #008CBA; border-radius: 2px" type="button" onload="refresh()" class="btn btn-primary btn-block active">Actualiser</a>
      </div>
    </div>

  </main>


  <?php
  include("footer.html");
  ?>
</body>

</html>