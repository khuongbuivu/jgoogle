<?php
	include("../../config.php");
	include("../../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	$resultpost=mysqli_query($con,"DELETE FROM fs_help_click WHERE pointHelp=0");
	mysqli_close($con);
	
?>