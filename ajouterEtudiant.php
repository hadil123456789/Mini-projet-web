# Mini-projet-web
Hadil bouneb et feriel lamirem
<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
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

<body style="background-image: url('photo.jpg')" >
>
  <?php
  include("entete.html");
  ?>

<main role="main">
        <div class="jumbotron" style="background-color: transparent">
            <div class="container">
            <h2  style="color :#031B88" ><?php echo  $bienvenue?></h2>
              <h1 style="color :#031B88" class="display-4">Ajouter un étudiant</h1>
              <h3 style=" color : #8A5082">Remplir le formulaire ci-dessous afin d'ajouter un étudiant!</h3>
            </div>
          </div>


<div class="container">
 <form id="myform" method="GET" action="ajouter.php" >
     <!--
                        TODO: Add form inputs
                        Prenom - required string with autofocus
                        Nom - required string
                        Email - required email address
                        CIN - 8 chiffres
                        Password - required password string, au moins 8 letters et chiffres
                        ConfirmPassword
                        Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                        Adresse - required string
                    -->
     <!--Nom-->
     <div class="form-group">
     <label style="color :#031B88" for="nom">Nom:</label><br>
     <input type="text" style="color :#031B88" id="nom" name="nom" class="form-control" required autofocus>
    </div>
     <!--Prénom-->
     <div class="form-group">
     <label style="color :#031B88" for="prenom">Prénom:</label><br>
     <input type="text" id="prenom" name="prenom" class="form-control" required>
    </div>
     <!--Email-->
     <div class="form-group">
        <label style="color :#031B88" for="email">Email:</label><br>
        <input type="email" id="email" name="email" class="form-control" required>
       </div>
     <!--CIN-->
     <div class="form-group">
     <label style="color :#031B88" for="cin">CIN:</label><br>
     <input type="text" style="color :#031B88" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div>
     <!--Password-->
     <div class="form-group">
     <label style="color :#031B88" for="pwd">Mot de passe:</label><br>
     <input type="password" style="color :#031B88" id="pwd" name="pwd" class="form-control"  required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres"/>
    </div>
    <!--ConfirmPassword-->
    <div class="form-group">
        <label style="color :#031B88" for="cpwd">Confirmer Mot de passe:</label><br>
        <input type="password" style="color :#031B88" id="cpwd" name="cpwd" class="form-control"  required/>
    </div>
     <!--Classe-->
     <div class="form-group">
     <label style="color :#031B88" for="classe">Classe:</label><br>
     <input type="text" style="color :#031B88" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
    </div>
     <!--Adresse-->
     <div class="form-group">
     <label style="color :#031B88" for="adresse">Adresse:</label><br>
     <textarea id="adresse" style="color :#031B88" name="adresse" rows="10" cols="30" class="form-control" required>
     </textarea>
    </div>
     <!--Bouton Ajouter-->
     <button  type="submit" class="btn btn-primary btn-block">Ajouter</button>


 </form> 
</div>  
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>

<script  src="./assets/dist/js/inscrire.js"></script>
</body>
</html>
