<?php

require_once("verifier.php");
require_once("connection.php");
require_once("session.php");
include("page accueil.php");  

if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") ){
      
$nivea_scolaire=" ";
$section=" ";

if (isset($_POST['chercher'])){ 
$nivea_scolaire=$_POST['nivea_scolaire'];
$section=$_POST['section'];       

$req = mysqli_query($con,"SELECT code_class from class where nivea_scolaire = '$nivea_scolaire' and section ='$section' ")
                                       or die (mysqli_error($con));
$code_class=mysqli_fetch_assoc($req);
if (empty($code_class['code_class'])){
    ?><SCRIPT LANGUAGE="Javascript">alert("erreur! Class n'existe pas!");</SCRIPT>
    <?php  
} 
if (empty($_POST['nom_module'])){
?><SCRIPT LANGUAGE="Javascript">alert("erreur! Svp choiser un module !");</SCRIPT>
<?php
}else{
$nom_module=$_POST['nom_module'];   

$req4 = mysqli_query($con,"SELECT code_coure from cours  where module ='$nom_module' and code_class = '".$code_class['code_class']."'")
                                       or die (mysqli_error($con));
$code_cour=mysqli_fetch_assoc($req4); 
}                         
$req3=mysqli_query($con,"SELECT * from etudiant where code_class='".$code_class['code_class']."'")or die (mysqli_error($con));


  
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="ajouternote.php" id ="customers">
    Class<td><select name="nivea_scolaire" id="nivea_scolaire">
            <option value="Premiere annee moyenne">Premiere annee moyenne</option>
            <option value="deuxieme annee moyenne">deuxieme annee moyenne</option>
            <option value="troisieme annee moyenne">troisieme annee moyenne</option>
            <option value="quatrieme annee moyenne">quatrieme annee moyenne</option>
            </select>
            </td> 
    Section
          <td><select name="section" id="section">
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            </select></td> 
        

    Module:<td><select name="nom_module">
    <?php if (isset($_POST['module'])){
          if (isset($_POST['nivea_scolaire']) and isset($_POST['section']) ){
            $nivea_scolaire=$_POST['nivea_scolaire'];
            $section=$_POST['section'];
            $req1 = mysqli_query($con,"SELECT module from class,cours  where class.code_class=cours.code_class and 
                             class.nivea_scolaire = '$nivea_scolaire' and class.section ='$section' ")
                                       or die (mysqli_error($con));
}
  
           while($module=mysqli_fetch_assoc($req1)) { ?>
            <option><?php echo($module['module']) ?></option>
            <option value="<?php echo($module['module']) ?>"</option>
            <?php  }  }?> </select></td> 
    
      
    <input type='submit'name='module' value='module'>        
    <input type='submit'name='chercher' value='chercher'>
    </form>
    <table id ="customers" >
        <tr>
            <th>Nom</th><th>Prenom</th>
        </tr>
        <?php  if (isset($_POST['chercher']) and isset($_POST['nom_module'])){
                 while($info = mysqli_fetch_assoc($req3)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <?php 
                 
                    $_SESSION['code_coure'] = $code_cour['code_coure'] ;
                    $_SESSION['code_class'] = $code_class['code_class'];
                  
               ?>
              <td><a href ="saisernote.php ?code=<?php echo($info['code'])  ?>"> Ajouter Les Notes </a> </td>
        
        </tr>

        <?php  } } ?> 
    </table>
</body>
</html>
                 <?php }else{
                     ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
                     <?php 
                 } ?>