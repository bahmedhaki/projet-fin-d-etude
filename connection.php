<?php
$servername = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($servername,$username,$password) or die(mysqli_error());
mysqli_select_db($con,"bd_school") or die(mysql_error());
?>