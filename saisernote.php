<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") ){
    
if(isset($_GET['code'])){
$_SESSION['code']=$_GET['code']; 
}
$code_classe=$_SESSION['code_class']; 
$code_cour=$_SESSION['code_coure']; 
$code_etud=$_SESSION['code'];


$note_semester="";
$note_annualle="";

 
$req3=mysqli_query($con,"SELECT  type_matiere from cours where code_class ='$code_classe' ");
$type_matiere=mysqli_fetch_array($req3)  or die (mysqli_error($con));

if(isset($_POST['dovior1']) and isset($_POST['semester']) and isset($_POST['examan'])){
  if($_POST['dovior1']!="" and $_POST['semester']!="" and $_POST['control_continu']!=""){
 
$dovior1=$_POST['dovior1'];
$control_continu=$_POST['control_continu'];
$examan=$_POST['examan'];


if ($type_matiere['type_matiere'] == 2){
    $dovior2=NULL;
    $notes=(($dovior1 + $control_continu) + ($examan * 3)) / 5 ;
    $note=sprintf(" %1\$.2f",$notes);

}else{
    $dovior2=$_POST['dovior2'];
    $notes=(($dovior1 + $dovior2 + $control_continu)/3 * 2 + ($examan * 3)) / 5 ;
    $note=sprintf(" %1\$.2f",$notes);
}
$control_continu=$_POST['control_continu'];
$semester=$_POST['semester'];
$req=mysqli_query($con,"SELECT count(*) as nb from note where code_etud ='$code_etud' and  code_class ='$code_classe' 
                     and  code_coure = '$code_cour' and semester='$semester' ")  or die (mysqli_error($con));
$nb=mysqli_fetch_array($req);
if($nb['nb']>0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
<?php
}else{
$req1=mysqli_query($con,"SELECT ceoffesion  from cours where code_coure ='$code_cour'")  or die (mysqli_error($con));
$ceoffesion=mysqli_fetch_array($req1);
$ceoff=$ceoffesion['ceoffesion'];  
$resul = $note * $ceoff;
$resultat=sprintf(" %1\$.2f",$resul);
$req2="INSERT INTO note (code_note,code_class,code_coure,semester,devoir1,devoir2,examan,control,note,resultat,note_semester,note_annualle,code_etud )
    VALUES (null,'$code_classe','$code_cour','$semester','$dovior1','$dovior2','$examan','$control_continu','$note','$resultat','$note_semester','$note_annualle','$code_etud')";  
mysqli_query($con,$req2)  or die (mysqli_error($con));
?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
require_once("moyennesemester.php");
}
}else{
?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
}
}

mysqli_close($con);
?>    
<html>
<head>
  <meta charset="UTF-8">
    <title>    
    </title>
    </head>
<body>
    <form method="post" action="saisernote.php" enctype="multipart/form-data">
    <table>
         <tr>
          <td>dovior1</td>
          <td><input type="text" name="dovior1"></td>     
        </tr>
        <tr>
        <?php if ($type_matiere['type_matiere']== 1){ ?>
          <td>dovior2</td>
          <td><input type="text" name="dovior2"></td>     
        </tr>
        <?php } ?>
        <tr>
          <td>control continu</td>
          <td><input type="text" name="control_continu"></td>     
        </tr>
        <tr>
          <td>examan</td>
          <td><input type="text" name="examan"></td>     
        </tr>
        <tr>
           <td>semester</td>
            <td><select name="semester">
            <option>Premiere semester</option>
            <option>deuxieme semester</option>
            <option>troisieme semester</option>
            </select>
            </td>     
        </tr> 
        <td>submit</td>
            <td><input type="submit" name="Enregistrer" value="Enregistrer"></td>     
        </tr>
        </table>
    </form>
    </body>
</html>
        <?php }else{
             ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
             <?php  
        } ?>