<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");
if(($_SESSION['type_user']=="admin")){

if(isset($_POST['Année_Scolaire'])){
    if ($_POST['Année_Scolaire']!= '' and $_POST['nivea_scolaire'] != '' and $_POST['section'] != '' ){
$Année_Scolaire = $_POST['Année_Scolaire']; 
$nivea_scolaire = $_POST['nivea_scolaire'];
$section = $_POST['section'];
$req=mysqli_query($con,"SELECT count(*) as nb from class where 	annee_scolaire ='$Année_Scolaire' 
                             and nivea_scolaire ='$nivea_scolaire' and 	section ='$section'") or die (mysqli_error($con));
$nb=mysqli_fetch_array($req);
if($nb['nb']>0){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
<?php
}
else{    
mysqli_query($con,"INSERT INTO class (code_class,nivea_scolaire,section,annee_scolaire) 
               VALUES (null,'$nivea_scolaire','$section','$Année_Scolaire')") or die (mysqli_error($con));
	?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
}
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
}
}
mysqli_close($con);
?>    
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <form method="post" action="ajouterclass.php" enctype="multipart/form-data">
    <table id="customers" >
        <tr>
          <td>Année Scolaire</td>
          <td><input type="year" name="Année_Scolaire"></td>     
        </tr>
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
        <tr>
         <td>submit</td>
          <td><input type="submit" value="Enregistrer"></td>     
        </tr>
        </table> 
    </form>
    </body>
</html>
<?php }else{
        ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
        <?php   

} ?>