<?php
include('connexion.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SCO-ENICAR Saisir Absence</title>
</head>

<body style="background-image: url('photo.jpg')">
  <?php
  include("entete.html");
  ?>
  <main role="main">
    <div class="jumbotron" style="background-color: transparent">
      <div class="container">
        <h1 style="color :#031B88"class="display-4">Signaler l'absence </h1>
        <h3 style=" color : #8A5082">Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</h3>
      </div>
    </div>

    <div class="container">
<?php

if($_SESSION["autoriser"]!="oui"){
header("location:login.php");
exit();
 }
 else {
  if (isset($_POST['ajouter'])) {  
$date=$_REQUEST['deb'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$module=$_REQUEST['module'];
$justifiée=$_REQUEST['justifiée'];
$classe=$_REQUEST['classe'];
  

include("connexion.php");
$req="insert into absence values ('$date','$nom','$prenom','$module','$justifiée','$classe')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
            
 }     
}    
?>

      <div class="container">
        <form action="saisieAb.php" method="POST" id="myForm">
          <div class="form-group">
            <label style="color :#031B88" for="deb">Choisir une date:</label><br>
            <input style="color :#031B88" type="date" id="deb" name="deb" value="2022-05-01" min="1980-01-01" max="2022-12-31">
          </div>
          
          <label style="color :#031B88" for="nom">Choisir le nom de l'étudiant:</label><br>
            <select  style="color :#031B88"id="nom" name="nom" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="nom de l'étudiant">
            
              <?php
              $sql1 = "SELECT * FROM etudiant";
              $stmt1 = $pdo->prepare($sql1);
              $stmt1->execute();
              while ($cat = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $cat['nom']; ?>">
                  <?php echo $cat['nom']; ?>
                </option>
                
              <?php }
              ?>
            </select>

            <label style="color :#031B88" for="prenom">Choisir le prenom de l'étudiant:</label><br>
            <select style="color :#031B88" id="prenom" name="prenom" class="custom-select custom-select-sm custom-select-lg" type="text" placeholder="prenom de l'étudiant"> 

            <?php
              $sql2 = "SELECT * FROM etudiant";
              $stmt2 = $pdo->prepare($sql2);
              $stmt2->execute();
              while ($cat = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $cat['prenom']; ?>">
                  <?php echo $cat['prenom']; ?>
                </option>
                
              <?php }
              ?>
              </select>


              <label style="color :#031B88" for="module">Ecrire un module:</label><br>
            <input style="color :#031B88" id="module" name="module" class="custom-select custom-select-sm custom-select-lg" type="text" >
            
            <label for="justifiée">justifiée ? :</label><br>
            <select  style="color :#031B88"class="custom-select custom-select-sm custom-select-lg" name="justifiée" id="justifiée">
            <option value="Oui">Oui</option>
            <option value="Non">Non</option>
            </select>





            <label  style="color :#031B88" for="classe">Select Classe:</label>
            <select style="color :#031B88" name="classe" id="classe" class="custom-select custom-select-sm custom-select-lg">
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
            
           
            <

            
            
           

            

            

              
              


              

            
          
          <button type="submit" name="ajouter" value="ajouter" class="btn btn-primary btn-block">Valider</button>
        </form>
      </div>
    </div>
  </main>
  <?php
  include("footer.html");
  ?>
</body>

</html>