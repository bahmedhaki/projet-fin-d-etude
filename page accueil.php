<?php
require_once("verifier.php");
require_once("connection.php");

$user = $_SESSION['utlisateur'];
$pass=$_SESSION['pass_word'];
$type_user=$_SESSION['type_user'];
//$req = "SELECT count(*) as nb,type_user FROM user where  password ='$pass' and user = '$user' ";
//$nb = mysqli_query($con,$req) or die (mysqli_error($con));
//$excute=mysqli_fetch_assoc($nb);
//if(!empty($excute['nb'])){
//  if($excute['type']=="etudiant")
//    $_SESSION['etudiant']=$excute['type_user'];
//  else if($excute['type']=="prof")
//    $_SESSION['prof']=$excute['type_user'];
//  else if($excute['type']=="admin")
//    $_SESSION['admin']=$excute['type_user'];
//}

?>
<!DOCTYPE html>
<html>
<title>Gestion Scolaire</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
<link rel="stylesheet" href="style2.css">
<link rel="stylesheet" href="style3.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Gestion Scolaire</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img\img_avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo($type_user); ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <?php// if(($_SESSION['type_user']=="admin") or  ($_SESSION['type_user']=="prof")) { ?>
  <div class="w3-bar-block">
   
    <a onclick="FuncEnseignant()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"></i>Enseignant</i></a>
    <div id="Enseignant" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficherprof.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Enseignant </a>
    <?php// } if(($_SESSION['type_user']=="admin")) { ?>
      <a href="ajouterprof.php" class="w3-bar-item w3-button">Ajouter un Enseignant</a>
    </div>
  <?php //} ?>
  <?php// if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof")) { ?>
    <a onclick="FuncEtudiants()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"></i>  Etudiants </i></a>
    <div id="Etudiants" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficher etudiant.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Etudiants </a>
  <?php //} if(($_SESSION['type_user']=="admin")) {  ?>
      <a href="ajouteretudian.php" class="w3-bar-item w3-button">Ajouter un étudiant</a>
      <?php // } ?>
    </div>
  <?php //if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="etudiant")) {?>
    <a onclick="FuncMatières()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"> Matières</a>
    <div id="Matières" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="affichermatier.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Matières </a>
      <?php //if(($_SESSION['type_user']=="admin")){ ?>
      <a href="ajoutermatier.php" class="w3-bar-item w3-button">Ajouter un Matières</a>
    </div>
    <?php //} }?>
    <?php //if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof")) {?>
    <a onclick="FuncClasse()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding">Salle DE Classe </a>
    <div id="Classe" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="afficherclass.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Classes </a>
      <?php //if($_SESSION['type_user']=="admin"){ ?>
      <a href="ajouterclass.php" class="w3-bar-item w3-button">Ajouter Un Classe</a>
    </div>
    <?php //} }?>
    <?php //if($_SESSION['type_user']=="admin"){?>
    <a onclick="FuncAbsences()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding">Absences </a>
    <div id="Absences" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
      <a href="ListeAbsences.php" class="w3-bar-item w3-button w3-light-grey">Liste Des Absences </a>
     
    </div>
    <?php //} ?>
    <?php //if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") or ($_SESSION['type_user']=="etudiant")) { ?>
    <a onclick="FuncNote()" href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"> Note </a>
    <div id="Note" class="w3-bar-block w3-hide w3-padding-large w3-medium ">
    <?php //if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof") or ($_SESSION['type_user']=="etudiant")) { ?>
      <?php //if(($_SESSION['type_user']=="admin") or ($_SESSION['type_user']=="prof")) { ?>
      <a href="ajouternote" class="w3-bar-item w3-button">Ajouter Un Note</a>
    </div>
    <?php //} } }?>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"> Quitter</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b></b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"></div>
        <div class="w3-right">
        <?php $req = "SELECT * FROM etudiant ";
         $excute = mysqli_query($con,$req) or die (mysqli_error($con));
         $i=0;
         while($info = mysqli_fetch_assoc($excute)) {
          $i=$i+1;} ?>
          <h3><?php echo($i) ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Etudiant</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"></div>
        <div class="w3-right">
        <?php $req = "SELECT * FROM prof ";
         $excute = mysqli_query($con,$req) or die (mysqli_error($con));
         $i=0;
         while($info = mysqli_fetch_assoc($excute)) {
          $i=$i+1;} ?>
          <h3><?php echo($i) ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Enseignant</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"></div>
        <div class="w3-right">
        <?php $req = "SELECT * FROM class ";
         $excute = mysqli_query($con,$req) or die (mysqli_error($con));
         $i=0;
         while($info = mysqli_fetch_assoc($excute)) {
          $i=$i+1;} ?>
          <h3><?php echo($i) ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>class</h4>
      </div>
    </div>
   </div>

  
  


<script>
// Accordion 
function FuncEnseignant() {
        var x = document.getElementById("Enseignant");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
function FuncEtudiants() {
        var x = document.getElementById("Etudiants");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncMatières() {
        var x = document.getElementById("Matières");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncClasse() {
        var x = document.getElementById("Classe");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncAbsences() {
        var x = document.getElementById("Absences");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    } 
function FuncNote() {
        var x = document.getElementById("Note");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }                    
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");
// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");
// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}
// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>