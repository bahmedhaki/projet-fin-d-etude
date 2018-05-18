<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php");  
if(($_SESSION['type_user']=="admin")){

if(isset($_POST['nom']) and isset($_POST['prenom'])){
  if($_POST['nom']!="" and $_POST['prenom']!="" and $_POST['telephone']!="" and $_POST['address']!="" ){
  $name = ($_POST['nom']); 
  $prenom = ($_POST['prenom']);
  $sex = ($_POST['sex']);
  $telephone = ($_POST['telephone']);
  $address = ($_POST['address']);
  $target_dir = "img/prof/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $file_tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($file_tmp_name,$target_file);
  
  
  $req=mysqli_query($con,"SELECT count(*) as nb from prof where nom='$name' and prenom='$prenom'")or die (mysqli_error($con));
  $nb=mysqli_fetch_array($req);
	if($nb['nb']>0){
	?><SCRIPT LANGUAGE="Javascript">alert("erreur! cet enregistrement existe déja!");</SCRIPT>
  <?php
   
	}
	else{
  $req2="INSERT INTO prof (code_prof,nom,prenom,telephone,sex,address,photo )
    VALUES (null,'$name', '$prenom','$telephone','$sex','$address','$target_file')";  
	mysqli_query($con,$req2) or die (mysqli_error($con));
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
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <form method="post" action="ajouterprof.php" enctype="multipart/form-data">
    <table id ="customers">
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"></td>     
        </tr>
         <tr>
          <td>telephone</td>
          <td><input type="text" name="telephone"></td>     
        </tr>
        <tr>
          <td>address</td>
          <td><input type="text" name="address"></td>     
        </tr>
        <tr>
          <td>photo</td>
          <td><input type="file" name="photo"id="photo"></td>   
        <tr>
        <td>Gender</td>
           <input type="hidden" name="sex" id="sex">
              <td> <input type="checkbox" value="Male">Male 
              <br>
               <input type="checkbox" value="Femelle">Femelle</td>
         </tr>
          <td>submit</td>
          <td><input type="submit" name="Enregistrer" value="Enregistrer"></td>     
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