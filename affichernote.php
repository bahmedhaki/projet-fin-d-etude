
<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
 
if(isset($_GET['code'])){
    $_SESSION['code_etudiant']=$_GET['code'];
    $code=$_SESSION['code_etudiant']; 
}else{
if (isset($_SESSION['code_etudiant'])){
$code=$_SESSION['code_etudiant'];
}
}
$req3=mysqli_query($con,"SELECT * from note where code_etud ='$code'") or die (mysqli_error($con));

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="affichernote.php">

    <table  id="customers">
    <tr>
        <tr>
            <th>Module</th><th>Semester</th><th>Devoir1</th><th>Devoir2</th>
            <th>Examan</th><th>Control Continue</th><th>Moyenne</th><th>Moyenne Semester</th><th>Moyenne Annuelle</th>
        </tr>
    
        <?php while($info = mysqli_fetch_assoc($req3)) { ?>
 <?php $req2=mysqli_query($con,"SELECT module from cours where code_class = '".$info['code_class']."'") or die (mysqli_error($con));?>
 <?php $module=mysqli_fetch_assoc($req2); ?>
              <td><?php echo($module['module'])  ?> </td>
              <td><?php echo($info['semester'])  ?> </td>
              <td><?php echo($info['devoir1'])  ?> </td>
              <td><?php echo($info['devoir2'])  ?> </td>
              <td><?php echo($info['examan'])  ?> </td>
              <td><?php echo($info['control'])  ?> </td>
              <td><?php echo($info['note'])  ?> </td>
              <td><?php echo($info['note_semester'])  ?> </td>
<?php
$code=$_SESSION['code_etudiant'];
$req="SELECT count(*) as nb  from note where code_etud ='$code' 
and (semester='Première semester'or semester='deuxième semester' or semester='troisième semester')";
$req1=mysqli_query($con,$req) or die (mysqli_error($con)) ;
$nb=mysqli_fetch_assoc($req1);

if($nb['nb']>= 3){
   
require_once("moyenneanualle.php");
    ?>  <td><?php echo($info['note_annualle'])  ?> </td>
<?php } ?>
 
            

        </tr>

      
        <?php }   ?> 
    </table>
</body>
</html>