<?php
	include("../../config.php");
	include("../../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_query($con,"DELETE FROM fs_ip_click_link");
	mysqli_close($con);
?>