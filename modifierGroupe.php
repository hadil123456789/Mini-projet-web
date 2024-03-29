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
        <h1  style="color :#031B88" class="display-4">Modifier les groupes</h1>
        <h3 style=" color : #8A5082">Cliquer sur le bouton afin d'actualiser la liste!</h3>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover" style="border: 2px solid blue; border-radius: 5px">
            <!--Ligne Entete-->

            <tr style="border: 2px solid blue; border-radius: 5px">
              <th style="color :#031B88">
                ID
              </th>
              <th style="color :#031B88" >
                Nom
              </th style="color :#031B88" >

              <th style="color :#031B88" >
                Editer
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php



            $sql = "SELECT * from classe";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($groupes = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $id_groupe = $groupes['id_groupe'];
              $name_classe = $groupes['name_classe'];

            ?>
              <tr>
                <td style="color :#031B88">
                  <?php echo $id_groupe ?>
                </td>
                <td style="color :#031B88" >
                  <?php echo $name_classe ?>
                </td>

                <td style="color :#031B88">
                  <?php
                  if ($_SESSION["autoriser"] != "oui") {
                    header("location:login.php");
                    exit();
                  } else {
                    if (isset($_POST['editGroupe'])) {
                      $id_groupe = $_POST['id_groupe'];
                      $name_classe = trim($_POST['name_classe']);

                      $sql = "UPDATE classe SET name_classe = :name_classe WHERE id_groupe = :id_groupe";
                      $stmt = $pdo->prepare($sql);
                      $stmt->execute([
                        ':name_classe' => $name_classe,
                        ':id_groupe' => $id_groupe
                      ]);
                      $erreur = "Modification effectuée";
                    }
                  }

                  ?>
                  <form action="modifierGroupe.php" method="POST" >
                    <input type="hidden" name="id_groupe" value="<?php echo $id_groupe ?>" />
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                      Editer
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 style="color :#031B88" class="modal-title" id="id_groupe">Editer Groupe</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" name="name_classe" value="<?php echo $id_groupe ?>" />
                              <label style="color :#031B88" for="nom">Nom:</label><br>
                              <input type="text" id="name_classe" name="name_classe" class="form-control" required autofocus>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="editGroupe" value="editer" class="btn btn-primary">Update</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </form>

                </td>
              </tr>

            <?php
            }
            ?>
          </table>
          <br>
        </div>
        
        <a href="modifierGroupe.php"  type="button" onload="refresh()"  style="vertical-align:middle ;background-color: transparent  ;color :#031B88 ; border: 2px solid #008CBA; border-radius: 12px" class="btn btn-primary btn-block active">Actualiser</a>
        
      </div>
    </div>

  </main>
  <?php
  include("footer.html");
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>