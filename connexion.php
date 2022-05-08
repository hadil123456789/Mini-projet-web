<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=gestion_etudiant","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
   
$con = mysqli_connect('localhost', 'root', '');
if (!$con) { die("database connection failed" . mysqli_error($con)); }
$select_db = mysqli_select_db($con, 'gestion_etudiant'); if (!$select_db) { die("database selected failed" . mysqli_error($con)); }
?>
