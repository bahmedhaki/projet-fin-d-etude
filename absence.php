<?php
require_once("verifier.php");
require_once("connection.php");
include("page accueil.php"); 

$Code = $_GET['code'];
$date="";
$date_debut="";
$date_fin="";
$commentaire="";
$Presence="";
$justifier="";

if (isset($_POST['date'])){
if($_POST['fin']!="" and $_POST['debut']!="" and $_POST['presence']!="" and $_POST['justifier']!="" ){ 
    $date_debut=$_POST['debut'];
    $date_fin=$_POST['fin'];
    $Presence=$_POST['presence'];
    $commentaire=$_POST['commentaire'];
    $justifier=$_POST['justifier'];
    $code_etudiant=$_POST['number'];
    
}
else{
?><SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT>
<?php
}
}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="registrerabsence.php" enctype="multipart/form-data">
    CODE:<input type='number' name='number' value ="<?php echo($Code) ?>">
    Date:<input type='date' name='date_today' value ="<?php echo($date) ?>">
    Heur_Debut:<input type="time" name='debut' value ="<?php echo($date_debut) ?>" >
    Heur_Fin:<input type="time" name='fin'value ="<?php echo($date_fin) ?>" >
                             
   
    <table  id="customers">
        <tr>
            <th>Presence</th><th>Justification</th><th>Commentaire</th>
        </tr>
        <tr>   
            <td><select name="presence">
            <option>En Retard</option>
            <option>Absent</option>
            </select>
            </td>     
            <td><select name="justifier">
            <option>Oui</option>
            <option>Non </option>
            </select>
            </td>     
        <td><input type='text' name='commentaire' ></td>     
      
    </table>
    <tr>
     <td><input type="submit" name= 'enregistrer' value="Enregistrer"></td> 
    
     </form>
</body>
</html>
