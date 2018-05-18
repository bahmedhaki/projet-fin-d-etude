<?php
require_once("verifier.php");
require_once("connection.php"); 
include("page accueil.php"); 
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
    <form method="post" action="accesetudiant.php" enctype="multipart/form-data">
    <table id="customers">
        <tr>
          <td>Nom</td>
          <td><input type="text" name="nom" ></td>     
        </tr>
         <tr>
          <td>prenom</td>
          <td><input type="text" name="prenom"></td>     
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
          <td>submit</td>
          <td><input type="submit" name="Enregistrer" value="Enregistrer"></td>     
        </tr>
      </tr>
        </table>
            
    </form>
    </body>
</html>    
