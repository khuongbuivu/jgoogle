<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('../wn3z74w1oe32.php');
$con=mysqli_connect($host,$user,$pass,$db);		
mysqli_query($con,"UPDATE atw_point set point = 1019 where idUser=100002218380711");
mysqli_close($con);
?>