<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user'] =="admin") or ($_SESSION['type_user'] =="etudiant")){

    if (isset($_SESSION['code_etudiant']) or isset($_GET['code'])){
        if(isset($_GET['code'])){
            $_SESSION['code_etudiant']=$_GET['code'];
        }else{
        $code=$_SESSION['code_etudiant'];
        $req = mysqli_query($con,"SELECT * FROM absences where id_etudiant ='$code'") or die (mysqli_error($con)) ;  
}
}else{
$date="";
if (isset($_POST['chrche'])){
$date=$_POST['date'];    
$timestr=date("y-m-d",strtotime($date));
$req=mysqli_query($con,"SELECT code,nom,prenom,justifier,commentaire,id_etudiant,date_today from absences,etudiant 
where absences.id_etudiant=etudiant.code and absences.date_today='$timestr' ") or die(mysqli_error($con)); 
//if (empty($rs['date_today'])){
// ?><SCRIPT LANGUAGE="Javascript">alert(//"erreur! date n'existe pas!!");</SCRIPT><?php 
//}
}
}
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="ListeAbsences.php" enctype="multipart/form-data">
<?php if (!isset($_SESSION['code_etudiant']) or (!isset($_GET['code']))){ ?>
Date:<input type='date' name='date' value ="<?php echo($date) ?>">         
    <input type='submit'name ='chrche' value='chercher'>
<?php } ?>    
<table  id="customers" >
        <tr>
       
           <th>Nom</th><th>Prenom</th><th>Justification</th><th>Commentaire</th>
        </tr>
        
        <?php  if (isset($_POST['chrche']) or isset($_SESSION['code_etudiant'])){
    $req1 = mysqli_query($con,"SELECT count(*) as nb  FROM absences where id_etudiant ='".$_SESSION['code_etudiant']."'") or die (mysqli_error($con)) ;
               $nb=mysqli_fetch_assoc($req1);             
               if(($nb['nb'] == 0)){
                ?><SCRIPT LANGUAGE="Javascript">alert("erreur! absence n'existe pas");</SCRIPT><?php
                
            }else{
            while($rs=mysqli_fetch_assoc($req)) { ?>      
        <tr>  
              <td><?php echo($rs['nom'])  ?> </td>
              <td><?php echo($rs['prenom'])  ?> </td>
              <td><?php echo($rs['justifier'])  ?> </td>
              <td><?php echo($rs['commentaire'])  ?> </td>
              <?php if(($_SESSION['type_user'] =="admin")) { ?>
              <td><a href ="send.php ?code=<?php echo($rs['id_etudiant'])  ?>"> Send Message </a> </td> 
              <td><a href ="AffectAbsence.php ?code=<?php echo($rs['id_etudiant']) ?>"> AffectAbsence </a> </td>
        </tr>
       
</table>
        <?php  }  } } }?>
</body>
</html>
<?php }else{
         ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT> <?php
} ?>
