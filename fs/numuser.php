<?php
include("config.php");
include_once("user.php");
include_once("system/function.php");
global $host;
global $user;
global $pass;
global $db;	
$con=mysqli_connect($host,$user,$pass,$db);
$result=mysqli_query($con,'select * from atw_user');	
$num = $result->num_rows;
echo number_format($num, 0, '', '.');
mysqli_close($con);
?>