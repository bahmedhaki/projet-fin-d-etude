<?php
require_once("verifier.php");
require_once("connection.php");
$Code = $_GET['code'];
$req ="DELETE FROM prof where (code_prof=$Code)";
mysqli_query($con,$req) or die(mysqli_error($con));
require_once("afficherprof.php");
?>