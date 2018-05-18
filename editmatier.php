<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user']=="admin")){

$Code = $_GET['code'];
$req ="SELECT * FROM  cours where (code_coure=$Code)";
$rs=mysqli_query($con,$req) or die(mysqli_error($con));
$etud=mysqli_fetch_assoc($rs);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="modifierematier.php" enctype="multipart/form-data">
    <table id ="customers">
        <tr>
          <td>Code</td>
          <td><input type="text" name="code" value="<?php echo($etud['code_coure']) ?>"></td>     
        </tr>
        <tr>
          <td>module</td>
          <td><input type="text" name="module" value="<?php echo($etud['module']) ?>"></td>     
        </tr>
         <tr>
          <td>ceoffesion</td>
          <td><input type="number" name="ceoffesion"value="<?php echo($etud['ceoffesion']) ?>"></td>     
        </tr>
        <tr>
        <td>type de matiere</td>
        <input type="hidden" name="type_matiere" id="type_matiere">
                 <td>
                   <input type="checkbox"  value="Matiere princibale"> Matiere princibale
                   <br> 
                  <input type="checkbox"  value="matiere socondaire"> matiere socondaire
                </td>
                
        </tr>
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
        </table>
            
    </form>  
</body>
</html>
<?php
mysqli_free_result($rs);
mysqli_close($con);
}else{
  ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
  <?php   
}?>