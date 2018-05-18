<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user']=="admin")){

$Code = $_GET['code'];
$req ="SELECT * FROM etudiant where (code=$Code)";
$rs=mysqli_query($con,$req) or die(mysqli_error($con));
$etud=mysqli_fetch_assoc($rs);
$req2 =mysqli_query($con,"SELECT * FROM class where code_class='".$etud['code_class']."'") or die(mysqli_error($con));
$class=mysqli_fetch_assoc($req2);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="modifieretudian.php" enctype="multipart/form-data">
    <table id ="customers" >
        <tr>
          <td>Code</td>
          <td><input type="text" name="code" value="<?php echo($etud['code']) ?>"></td>     
        </tr>
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" value="<?php echo($etud['nom']) ?>"></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"value="<?php echo($etud['prenom']) ?>"></td>     
        </tr>
        <tr>
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
        <tr>
           <td>niveau d'etude</td>
           <td><select name="nivea_scolaire" id="nivea_scolaire"  >
            <option value="Premiere annee moyenne">Premiere annee moyenne</option>
            <option value="deuxieme annee moyenne">deuxieme annee moyenne</option>
            <option value="troisieme annee moyenne">troisieme annee moyenne</option>
            <option value="quatrieme annee moyenne">quatrieme annee moyenne</option>
            </select>
            </td>     
        </tr>
        <tr><td>Section</td>
          <td><select name="section" id="section">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            </select></td> 
        </tr> 
        <tr>
           <td>date de naissance</td>
           <td><input type="date" name="Date"value="<?php echo($etud['date_de_naissance']) ?>"></td>     
        </tr> 
          <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
      </tr>
        </table>
            
    </form>  
</body>
</html>
<?php }else{
    ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
    <?php   
} ?>
