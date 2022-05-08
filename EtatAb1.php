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
                <h1  style="color :#031B88" class="display-4">État des absences pour un groupe</h1>
    
            </div>
        </div>

        <div class="container">
            <form action="EtatAb1.php" method="POST" id="myForm">
                <div class="form-group">
                    <label style="color :#031B88" for="classe"><h3>Choisir une classe:</h3></label><br>
                    <select id="classe" name="classe" class="custom-select custom-select-sm custom-select-lg">
                        <?php
                        $sql1 = "SELECT DISTINCT * FROM absence";
                        $stmt1 = $pdo->prepare($sql1);
                        $stmt1->execute();
                        while ($cats = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cats['classe']; ?>">
                                <?php echo $cats['classe']; ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                    <button type="submit" name="afficherpar">afficher</button>
                </div>
            </form>
        </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <!--Ligne Entete-->
                        <tr>
                            <th style="color :#031B88">
                                Nom
                            </th>
                            <th style="color :#031B88">
                                prenom
                            </th>
                            <th style="color :#031B88">
                                Classe
                            </th>
                            <th style="color :#031B88">
                                Date
                            </th>
                            <th style="color :#031B88">
                                Module
                            </th>
                            <th style="color :#031B88">
                                avec justification
                            </th>
                        </tr>
                        <?php

                        if ($_SESSION["autoriser"] != "oui") {
                            header("location:login.php");
                            exit();
                        } else {
                            if (isset($_POST['afficherpar'])) {
                                $classe = $_POST['classe'];
                                $sql = "SELECT  * from absence where classe = :classe";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':classe' => $classe,
                                ]);
                                while ($etudiants = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $nom = $etudiants['nom'];
                                    $classe = $etudiants['classe'];
                                    $prenom = $etudiants['prenom'];
                                    $date = $etudiants['date'];
                                    $module = $etudiants['module'];
                                    $justifiée = $etudiants['justifiée'];
                        ?>
                                    <tr>
                                        <td style="color :#031B88">
                                            <?php echo $nom ?>
                                        </td>
                                        <td style="color :#031B88">
                                            <?php echo $prenom ?>
                                        </td>
                                        <td style="color :#031B88">
                                            <?php echo $classe ?>
                                        </td>
                                        <td style="color :#031B88">
                                            <?php echo $date ?>
                                        </td>
                                        <td style="color :#031B88">
                                            <?php echo $module ?>
                                        </td>
                                        <td style="color :#031B88">
                                            <?php echo $justifiée ?>
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
                <button type="button" onload="refresh()" class="btn btn-primary btn-block active">Actualiser</button>
            </div>
        </div>
    </main>

    <?php
    include("footer.html");
    ?>


</body>

</html>