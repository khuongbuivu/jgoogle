<?php
	include("../../config.php");
	include("../../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	$date= date('d/m/y');
	mysqli_query($con,"DELETE FROM atw_click_link where timestart not like '%".$date."%'");
	mysqli_close($con);
?>