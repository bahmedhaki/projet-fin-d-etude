<?php
require_once("verifier.php");
require_once("connection.php");
$code = $_POST['code'];
$name = $_POST['nom']; 
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];


$sql = "UPDATE prof set nom='$name', prenom='$prenom',telephone='$telephone', address ='$address' where code_prof='$code'";
mysqli_query($con, $sql) or die (mysqli_error($con));
require_once("afficher etudiant.php");
mysqli_close($con);

?>    
