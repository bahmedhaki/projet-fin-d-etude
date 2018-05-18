<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");

if(($_SESSION['type_user']=="admin") or($_SESSION['type_user']=="prof") or($_SESSION['type_user']=="etudiant") ){ 
if (isset($_SESSION['code_etudiant'])){
    $code=$_SESSION['code_etudiant'];
    $req = "SELECT * FROM etudiant where code='$code' ";
    $excute = mysqli_query($con,$req) or die (mysqli_error($con));    
}else{  
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
$req = "SELECT * FROM etudiant where code_class='$class_code' ";
$excute = mysqli_query($con,$req) or die (mysqli_error($con));
}
}
}
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="afficher etudiant.php" enctype="multipart/form-data">
        <tr>
        <?php if (!isset($_SESSION['code_etudiant'])){ ?>
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
        <?php } ?>
</form>   
    <table id="customers">
        <tr>
            <th>Nom</th><th>Prenom</th><th>telephone</th>
            <th>Address</th><th>Date De Naissance</th><th>Photo</th>
        </tr>        

        <?php   if (isset($_POST['cherche']) or isset($_SESSION['code_etudiant']) ){ 
                   while($info = mysqli_fetch_assoc($excute)) { ?>
        <tr>
              <td><?php echo($info['nom'])  ?> </td>
              <td><?php echo($info['prenom'])  ?> </td>
              <td><?php echo($info['telephone'])  ?> </td>
              <td><?php echo($info['address'])  ?> </td>
              <td><?php echo($info['date_de_naissance'])  ?> </td>
              <td><img style="width: 20%; border-radius: 50%;" src="<?php echo($info['photo'])  ?>"></td>
              <?php if(($_SESSION['type_user'] == "admin")){ ?>
              <td><a href ="editetudiant.php ?code=<?php echo($info['code'])  ?>"> EDITER </a> </td>
              <td><a href ="supprimeretudiant.php ?code=<?php echo($info['code'])  ?>"> Supprimer </a> </td>
              <td><a href ="absence.php ?code=<?php echo($info['code']) ?>"> Absence </a> </td>
              <?php } ?>
              <?php if(($_SESSION['type_user'] == "admin") or($_SESSION['type_user']=="prof") ){ ?>
              <td><a href ="send.php ?code=<?php echo($info['code'])  ?>"> Send Message </a> </td>
              <?php } ?>
              <td><a href ="affichernote.php ?code=<?php echo($info['code'])  ?>"> Afficher Note </a> </td>
              <td><a href ="ListeAbsences.php ?code=<?php echo($info['code']) ?>"> Liste Des Absence </a> </td> 


        </tr>
        <?php } } ?> 
    </table>
</body>
</html>
<?php }else{
         ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT> <?php
} ?>