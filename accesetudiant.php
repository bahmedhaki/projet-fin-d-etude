<?php
require_once("verifier.php");
require_once("connection.php"); 
include("page accueil.php"); 

$name = ($_POST['nom']); 
$prenom = ($_POST['prenom']);
$nivea_etud = ($_POST['nivea_scolaire']);
$section = ($_POST['section']);

$class=mysqli_query($con,"SELECT code_class from class where nivea_scolaire ='$nivea_etud' and  section='$section'") or die (mysqli_error($con));
$code_class=mysqli_fetch_assoc($class);
$class_code=$code_class['code_class'];

if(empty($class_code)){
  ?><SCRIPT LANGUAGE="Javascript">alert("erreur! class n'existe pas!");</SCRIPT>
  <?php
}else{
$req=mysqli_query($con,"SELECT code from etudiant where nom='$name' and prenom='$prenom'") or die (mysqli_error($con));
$nb=mysqli_fetch_assoc($req);
	if(empty($nb['code'])){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet etudiant n'existe pas!");</SCRIPT>
<?php 
}else{
    $_SESSION['code_etudiant']=$nb['code'];
    ?><script><?php echo("location.href = '".ADMIN_URL."/page accueil.php?msg=$msg';");?></script><?php

     
  
}
}

?>