<?php
$user = $_SESSION['utlisateur'];
$pass=$_SESSION['pass_word'];
$type_user=$_SESSION['type_user'];
session_unset();
session_destroy();
session_start();

$_SESSION['utlisateur']=$user;
$_SESSION['pass_word']=$pass;
$_SESSION['type_user']=$type_user;
?>