<?php
	include("../../config.php");
	include("../../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_query($con,"DELETE n1 from atw_point n1, atw_point n2 WHERE n1.idUser= n2.idUser AND n1.point_id < n2.point_id");
	mysqli_query($con,"DELETE FROM `atw_point` WHERE idUser NOT IN (select user_id from atw_user)");
	mysqli_close($con);
?>

