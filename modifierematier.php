<?php
require_once("verifier.php");
require_once("connection.php");

$module = $_POST['module']; 
$ceoffesion = $_POST['ceoffesion'];
$type_matiere = $_POST['type_matiere'];


$sql = "UPDATE cours set ceoffesion='$ceoffesion', module='$module',type_matiere ='$type_matiere'
                       where code_coure='".$_POST['code']."' ";
mysqli_query($con, $sql) or die (mysqli_error($con));
require_once("affichermatier.php");
mysqli_close($con);

?>    
