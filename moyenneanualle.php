<?php
$Première_semester="Première semester";
$deuxième_semester="deuxième semester";
$troisième_semester="troisième semester";
$resultat=0;
$conpteur=0;
$code=$_SESSION['code_etudiant'];
$req="SELECT note_semester from note where code_etud ='$code' 
and (semester='Première semester'or semester='deuxième semester' or semester='troisième semester')";
$req1=mysqli_query($con,$req) or die (mysqli_error($con)) ;
$nb1=mysqli_fetch_assoc($req1);
?><SCRIPT LANGUAGE="Javascript">alert(" note_annualle entre avec succés!");</SCRIPT><?php
if(empty($nb1['note_semester'])){
    ?><SCRIPT LANGUAGE="Javascript">alert("erreur! note_semester n'existe pas !");</SCRIPT>
    <?php     
}else{
while($nb1=mysqli_fetch_assoc($req1) and ($conpteur < 3 )){
       $resultat=$resultat+$nb1['note_semester']; 
       $conpteur=$conpteur+1;
     }

$note_annualle=$resultat / 3 ;
?><SCRIPT LANGUAGE="Javascript">alert(" note_annualle calcul avec succés!");</SCRIPT><?php

echo($note_annualle);
$sql = "UPDATE note set note_annualle='$note_annualle' where code_etud='$code_etud' ";
mysqli_query($con, $sql) or die (mysqli_error($con));
?><SCRIPT LANGUAGE="Javascript">alert(" note_annualle Ajout avec succés!");</SCRIPT><?php
}
?>
