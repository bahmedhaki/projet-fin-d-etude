<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
$nom="";
$niveau="";
$section="";

if (isset($_POST['cherche'])){
if ($_POST['nivea_scolaire']!='' and $_POST['section']!='' and $_POST['Nom']!='' ){
    $nom = $_POST['Nom'];
    $niveau=$_POST['nivea_scolaire'];
    $section=$_POST['section'];

$req="SELECT code_class FROM class where nivea_scolaire = '$niveau'  and section = '$section' " ;
$rs=mysqli_query($con,$req) or die(mysql_error($con));
$nb=mysqli_fetch_array($rs);
$code_class=$nb['code_class'];
$req1 = "SELECT count(*) as nb FROM etudiant where nom ='$nom' and code_class = '$code_class' " ;
$etud = mysqli_query($con,$req1) or die (mysqli_error($con));


}
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="chercheretudiant.php">
    Class:<tr>
            <td><select name="nivea_scolaire" id="nivea_scolaire">
            <option value="Premiere annee moyenne">Premiere annee moyenne</option>
            <option value="deuxieme annee moyenne">deuxieme annee moyenne</option>
            <option value="troisieme annee moyenne">troisieme annee moyenne</option>
            <option value="quatrieme annee moyenne">quatrieme annee moyenne</option>
            </select>
            </td>     
        </tr>
        
    Section:<tr>
          <td><select name="section" id="section">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            </select></td> 
        </tr> 
    Nom:<input type='text' name='Nom' value ="<?php echo($nom) ?>">         
    <input type='submit' name='cherche' value='chercher'>
    </form>
    <table border = "1" widht="80%">
        <tr>
            <th>Code</th><th>Nom</th><th>Prenom</th><th>telephone</th>
            <th>Address</th><th>Date De Naissance</th><th>Photo</th>
        </tr>
        <?php if (isset($_POST['cherche'])){ 
        while($info = mysqli_fetch_assoc($etud)) { ?>
        <tr>
              <td><?php echo($info['code'])  ?> </td>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['telephone'])  ?> </td>
              <td><?php echo($info['address'])  ?> </td>
              <td><?php echo($info['date_de_naissance'])  ?> </td>
              <td><img src="<?php echo($info['photo'])  ?>"></td>
              <td><a href ="editetudiant.php ?code=<?php echo($info['code'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
        </tr>

        <?php  } }?> 
    </table>
</body>
</html>