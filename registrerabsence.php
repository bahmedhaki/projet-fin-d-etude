<?php
require_once("verifier.php");
require_once("connection.php");
$code_etudiant = $_POST['number'];
$date = $_POST['date_today']; 
$heur_debut = $_POST['debut'];
$heur_fin = $_POST['fin'];
$Presence = $_POST['presence'];
$commentaire = $_POST['commentaire'];
$justifier = $_POST['justifier'];



$sql = "INSERT INTO absences (id_etudiant,date_today,heur_debut,heur_fin,presence,commentaire,justifier)
VALUES ('$code_etudiant','$date','$heur_debut','$heur_fin','$Presence','$commentaire','$justifier')";
?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
mysqli_query($con, $sql) or die (mysqli_error($con));
header("location:afficher etudiant.php");
mysqli_close($con);
?>    
