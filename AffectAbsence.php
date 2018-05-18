<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php"); 
if(($_SESSION['type_user'] <> "admin")){
    ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
            <?php   
}else{
$Code = $_GET['code'];

?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="registrerabsencesaffecter.php" enctype="multipart/form-data">
    <table  id ="customers">
    <tr>
    <th>CODE</th><th>Justification</th><th>Commentaire</th>
        </tr>
        <tr>   
          <td><input type='number' name='number' value ="<?php echo($Code) ?>"> </td>    
           <td><select name="justifier">
            <option>Oui</option>
            <option>Non </option>
            </select>
            </td>     
        <td><input type='text' name='commentaire' ></td>  
            
        </tr>
     
        </table>
        <td><input type="submit" named="Enregistrer" value="Enregistrer"></td> 
            
    </form>  
</body>
</html>
<?php
mysqli_close($con);
}?>