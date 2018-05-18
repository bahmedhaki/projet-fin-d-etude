<?php
require_once("verifier.php");
require_once("connection.php");


$commentaire = $_POST['commentaire'];
$justifier = $_POST['justifier'];

$sql = "UPDATE absences set justifier='$justifier',commentaire='$commentaire' where id_etudiant='".$_POST['number']."' ";
mysqli_query($con, $sql) or die (mysqli_error($con));
?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
header("location:ListeAbsences.php");
mysqli_close($con);
?>    
