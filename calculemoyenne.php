<?php
 
$ceoff=0;
$resultat=0;
$note_semester=0;
$req=mysqli_query($con,"SELECT count(note_semester) as nb from note where code_etud ='$code_etud' and  code_class ='$code_classe' ");
$nb=mysqli_fetch_array($req);
if($nb['nb']>0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
<?php
    header("location:ajouternote.php");
}
else{
$req1=mysqli_query($con,"SELECT ceoffesion  from cours where code_class ='$code_classe' ");
while ($ceoffesion=mysqli_fetch_array($req1)){
    $ceoff=$ceoff + $ceoffesion['ceoffesion'];
}

$req2=mysqli_query($con,"SELECT resultat  from note where code_etud ='$code_etud'");
while ($moyenne=mysqli_fetch_array($req2)){
$resultat=$resultat+$moyenne['resultat'];
}

$note_semester=$resultat / $ceoff ;

$sql = "UPDATE note set note_semester='$note_semester' where code_etud='$code_etud'";
mysqli_query($con, $sql) or die (mysqli_error($con));
}
?>
