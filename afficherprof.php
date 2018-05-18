
<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");

$req = "SELECT * FROM prof";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <table  id="customers">
        <tr>
            <th>Nom</th><th>Prenom</th><th>telephone</th>
            <th>Address</th><th>Photo</th>
        </tr>
        
        <?php  while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['telephone'])  ?> </td>
              <td><?php echo($info['address'])  ?> </td>
              <td><img style="width: 20%; border-radius: 50%;" src="<?php echo($info['photo'])  ?>"></td>
              <?php if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof")){ ?>
              <td><a href ="editeprof.php ?code=<?php echo($info['code_prof'])  ?>"> EDITER </a> </td>
              <?php if(($_SESSION['type_user']=="admin")){ ?>
              <td><a href ="supprimerprof.php ?code=<?php echo($info['code_prof'])  ?>"> Supprimer </a> </td>
              <td><a href ="send.php ?code_prof=<?php echo($info['code_prof'])  ?>"> Send Message </a> </td> 

        </tr>

        <?php } } }?> 
    </table>
</body>
</html>
