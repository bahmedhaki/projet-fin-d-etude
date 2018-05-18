<?php
require_once("verifier.php");
require_once("connection.php"); 
include("page accueil.php"); 
if(($_SESSION['type_user']=="admin")){

if(isset($_POST['matier'])){
  if($_POST['nom']!="" and $_POST['Ceoffesion']!="" and $_POST['nivea_scolaire']!=""and $_POST['matiere']=!"" and $_POST['section']=!""){
  $module = ($_POST['nom']); 
  $Ceoffesion = ($_POST['Ceoffesion']);
  $nivea_etud = ($_POST['nivea_scolaire']);
  $section = ($_POST['section']);
  $type_matiere=($_POST['matiere']);

  $class=mysqli_query($con,"SELECT code_class from class where nivea_scolaire ='$nivea_etud' and  section='$section'") or die (mysqli_error($con));
  $code_class=mysqli_fetch_array($class);
  $class_code=$code_class['code_class'];
  if(empty($code_class['code_class'])){
      ?><SCRIPT LANGUAGE="Javascript">alert("erreur! class n'existe pas!");</SCRIPT>
      <?php
  }else{
  $req=mysqli_query($con,"SELECT count(*) as nb from  cours where 	module ='$module' and code_class ='$class_code' ") or die (mysqli_error($con));
  $nb=mysqli_fetch_assoc($req);
	if($nb['nb']>0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
  <?php
   }else{
  $req2="INSERT INTO cours (code_coure,code_class,ceoffesion,module,type_matiere)
    VALUES (null,'$class_code','$Ceoffesion','$module','$type_matiere')";  
	mysqli_query($con,$req2);
  ?><SCRIPT LANGUAGE="Javascript">alert("Ajout avec succés!");</SCRIPT><?php
      }
	}
	}
	else{
  ?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
  <?php
	}
}
?>    
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <form method="post" action="ajoutermatier.php" enctype="multipart/form-data">
    <table id ="customers">
        <tr>
          <td>Nom De Matier</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>Ceoffesion</td>
          <td><input type="number" name="Ceoffesion"></td>     
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
        <tr><td>type de matiere</td>
          <td><select name="matiere" id="matiere">
            <option value="Matiere princibale">Matiere princibale</option>
            <option value="Matiere socondaire">matiere socondaire</option>
            </select></td> 
        </tr> 
        <tr>
          <td>submit</td>
          <td><input type="submit" name="matier" value="Enregistrer"></td>     
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