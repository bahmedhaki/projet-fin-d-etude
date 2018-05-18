<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") ){

$Code = $_GET['code'];
$req ="SELECT * FROM  prof where (code_prof='$Code') ";
$rs=mysqli_query($con,$req) or die(mysqli_error($con));
$etud=mysqli_fetch_assoc($rs);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="modifierprof.php" enctype="multipart/form-data">
    <table id ="customers">
        <tr>
          <td>Code</td>
          <td><input type="text" name="code" value="<?php echo($etud['code_prof']) ?>"></td>     
        </tr>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" value="<?php echo($etud['nom']) ?>"></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"value="<?php echo($etud['prenom']) ?>"></td>     
        </tr>
        <tr><td>Gender</td>
          <td><select name="sex" id="sex" value="<?php echo($etud['sex']) ?>">
             <option value="Femelle">Femelle</option>
            <option value="Male">Male</option>
            
            </select></td> 
        </tr> 
         <tr>
          <td>telephone</td>
          <td><input type="text" name="telephone"value="<?php echo($etud['telephone']) ?>"></td>     
        </tr>
        <tr>
          <td>address</td>
          <td><input type="text" name="address"value="<?php echo($etud['address']) ?>"></td>     
        </tr>
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
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

} ?>