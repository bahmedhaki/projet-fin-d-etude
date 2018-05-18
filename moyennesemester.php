<?php
$code_classe=$_SESSION['code_class']; 
$code_cour=$_SESSION['code_coure']; 
$code_etud=$_SESSION['code'];
$resultat=0;
$ceoffesion=0;

$req2 = "SELECT ceoffesion FROM cours where code_class='$code_classe'";
$exc= mysqli_query($con,$req2) or die (mysqli_error($con));
while($ceof = mysqli_fetch_assoc($exc)) {
        $ceoffesion=$ceof['ceoffesion']+$ceoffesion;
        
}

$req1 = "SELECT semester FROM note where code_class='$code_classe' and code_etud='$code_etud' ";
$sem = mysqli_query($con,$req1) or die (mysqli_error($con));

while($info = mysqli_fetch_assoc($sem)){
if($info['semester']=="Premiere semester"){
$req = "SELECT resultat FROM note where code_class='$code_classe' and code_etud='$code_etud' 
and  semester ='Premiere semester'";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
while($inf = mysqli_fetch_assoc($excute)) {
    $resultat=$inf['resultat']+$resultat;
}

$moyenn=$resultat/$ceoffesion;
$moyennsemester=sprintf(" %1\$.2f",$moyenn);

$sql = "UPDATE note set note_semester='$moyennsemester' where code_etud='$code_etud' and code_class='$code_classe'
and semester ='Premiere semester' ";
mysqli_query($con, $sql) or die (mysqli_error($con));
}

if($info['semester']=="deuxieme semester"){
$req = "SELECT resultat FROM note where code_class='$code_classe' and code_etud='$code_etud' 
and   semester ='deuxieme semester' ";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
while($inf = mysqli_fetch_assoc($excute)) {
        $resultat=$inf['resultat']+$resultat;
}

$moyenn=$resultat/$ceoffesion;
$moyennsemester=sprintf(" %1\$.2f",$moyenn);

$sql = "UPDATE note set note_semester='$moyennsemester' where code_etud='$code_etud' and code_class='$code_classe'
and semester ='deuxieme semester'  ";
mysqli_query($con, $sql) or die (mysqli_error($con)); 
$resultat=0;
}
if($info['semester']=="troisieme semester"){
$req = "SELECT resultat FROM note where code_class='$code_classe' and code_etud='$code_etud' 
    and  semester ='troisieme semester'";
$excute1 = mysqli_query($con,$req) or die (mysqli_error($con));
while($inf = mysqli_fetch_assoc($excute1)) {
        $resultat=$inf['resultat']+$resultat;
}


$moyenn=$resultat/$ceoffesion;
$moyennsemester=sprintf(" %1\$.2f",$moyenn);

$sql = "UPDATE note set note_semester='$moyennsemester' where code_etud='$code_etud' and code_class='$code_classe'
and semester ='troisieme semester' ";
mysqli_query($con, $sql) or die (mysqli_error($con)); 
$resultat=0;
}
}


?>