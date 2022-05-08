<?php
require_once("connexion.php");
session_start();
if ($_SESSION["autoriser"] != "oui") {
  header("location:login.php");
  exit();
}
?>
!DOCTYPE html>
<html lang="en">

<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #fff;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #fff;}

#customers tr:hover {background-color: #fff;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: transparent;
  color: white;
}
</style>

</head style="background-color: #47CACc;">
<body style="background-image: url('photo.jpg')" >
<?php include("entete.html"); ?>
<main role="main">
    <div class="jumbotron"style="background-color :transparent">
      <div class="container">
        <h1  style="color :#031B88"  class="display-4">Liste des Groupes</h1>
        
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="table-responsive">
          <table id="customers" class="table table-striped table-hover ">
            <!--Ligne Entete-->

            <tr>
              <th  style="color :#031B88">
                groupe
              </th>
              <th  style="color :#031B88">
                id_groupe
              </th>
            </tr>
            <!--1er Etudiant-->
            <?php



            $sql = "SELECT * from classe";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($classe = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
              $groupe = $classe['name_classe'];
              $id=$classe['id_groupe'];
            ?>
              <tr>
                <td  style="color :#031B88">
                  <?php echo $groupe ?>
                </td>
                <td  style="color :#031B88" >
                  <?php echo $id ?>
                </td>
                
              </tr>

            <?php
            }
            ?>
          </table>
          <br>
        </div>
        
      </div>
    </div>

  </main>


  <?php
  include("footer.html");
  ?>
</body>

</html>























</body>
