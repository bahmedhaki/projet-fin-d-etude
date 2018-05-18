<?php 
include("page accueil.php");
if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") ){

if (!empty($_GET['code_prof'])){
    $code_prof=$_GET['code_prof'];
    $req1=mysqli_query($con,"SELECT telephone  from prof where code_prof ='$code_prof'") or die(mysqli_error($con));
    $etud=mysqli_fetch_assoc($req1);
}
if (!empty($_GET['code'])){
$code_etudiant=$_GET['code'];
$req1=mysqli_query($con,"SELECT telephone  from etudiant where code ='$code_etudiant'") or die(mysqli_error($con));
$etud=mysqli_fetch_assoc($req1);
}
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style table.css">
</head>
<body>
<form method="post" action="sendmessage.php">
<table align="center" id="customers">
<tr>
<td>telephone</td>
<td><input type="text" name="telephone" value="<?php echo($etud['telephone']) ?>"></td>     
</tr>
<tr>
<td>message:</td>
<td><textarea name="mess" placeholder="enter your message"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="abc" value="send"></td>
</tr>
</table>
</form>
</body>
</html>
<?php }else{
        ?><SCRIPT LANGUAGE="Javascript">alert("Vous avez pas le droit d'accéder à cette page!");</SCRIPT>
        <?php   
} ?>