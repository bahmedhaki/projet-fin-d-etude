<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");

if (isset($_POST['cherche'])){
if(isset($_POST['nivea_scolaire']) and isset($_POST['section'])){
$nivea_etud = ($_POST['nivea_scolaire']);
$section = ($_POST['section']); 
$req=mysqli_query($con,"SELECT code_class from  class where nivea_scolaire ='$nivea_etud' and section ='$section'") or die (mysqli_error($con));
$code_class=mysqli_fetch_assoc($req);
$class_code=$code_class['code_class'];
if(empty($code_class['code_class'])){
    ?><SCRIPT LANGUAGE="Javascript">alert("erreur! class n'existe pas!");</SCRIPT>
    <?php
}else{
$req1=mysqli_query($con,"SELECT * from  cours where  code_class ='$class_code'") or die (mysqli_error($con));
}
}
}
?>
<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
</head>
<body>
    <form method="post" action="affichermatier.php" enctype="multipart/form-data">
        <tr>
           <td>niveau d'etude</td>
           <td><select name="nivea_scolaire" id="nivea_scolaire">
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
        </tr>
          <td>submit</td>
          <td><input type="submit" name="cherche" value="chercher"></td>     
        </tr>
    </form>
    <table id="customers">
        <tr>
            <th>Module</th><th>Ceoffesion</th>
        </tr>        
        <?php  
              if (isset($_POST['cherche']) and (!empty($code_class['code_class']))){
                  while($info = mysqli_fetch_assoc($req1)) { ?>
        <tr>
              <td><?php echo($info['module'])  ?> </td>
              <td><?php echo($info['ceoffesion'])  ?> </td>
              <?php if(($_SESSION['type_user']=="admin")){ ?>
              <td><a href ="editmatier.php ?code=<?php echo($info['code_coure'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimermatier.php ?code=<?php echo($info['code_coure'])  ?>"> Supprimer </a> </td>
        </tr>
        <?php } } }?> 
    </table>
    </form>
</body>
</html>
