<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");

$req = "SELECT * FROM class";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <table id="customers">
        <tr>
            <th>Niveau Scolaire</th><th>Section</th><th>Annee Scolaire</th>
        </tr>        
        <?php  while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>
              <td><?php echo($info['nivea_scolaire'])  ?> </td>
              <td><?php echo($info['section'])  ?> </td>
              <td><?php echo($info['annee_scolaire'])  ?> </td>
              <td><a href ="editclass.php ?code=<?php echo($info['code_class'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimerclass.php ?code=<?php echo($info['code_class'])  ?>"> Supprimer </a> </td>
        </tr>
        <?php } ?> 
    </table>
</body>
</html>