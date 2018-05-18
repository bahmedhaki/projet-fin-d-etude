<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php"); 

$name = $_POST['nom']; 
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$nivea_etud = $_POST['nivea_scolaire'];
$section = $_POST['section'];
$sex=$_POST['sex'];
$date_naissance = $_POST['Date'];

$req2 =mysqli_query($con,"SELECT code_class FROM class where  section = '$section' and nivea_scolaire ='$nivea_etud' ") or die(mysqli_error($con));
$class=mysqli_fetch_assoc($req2);
$code_class=$class['code_class'];
if(empty($class['code_class'])){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! class n'existe pas!!");</SCRIPT><?php
}else{
$sql = "UPDATE etudiant set nom='$name', prenom='$prenom',telephone='$telephone', address ='$address',
          	sex='$sex',date_de_naissance='$date_naissance',code_class='$code_class' where code='".$_POST['code']."'";
mysqli_query($con, $sql) or die (mysqli_error($con));

}
?><script><?php echo("location.href = '".ADMIN_URL."/afficher etudiant.php?msg=$msg';");?></script><?php

mysqli_close($con);
?>    
