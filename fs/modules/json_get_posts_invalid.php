<?php
	include_once("../definelocal.php");
	include_once("../define.php");
	include_once("../time.php");
	include_once("../config.php");
	include_once("../fcomment.php");
	include_once("../user.php");
	include_once("../system/function.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	// using with json
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");

	$result_posts=mysqli_query($con,"select * from fs_reported" );	
	$posts = array();
	$i=0;
	while ($r=mysqli_fetch_array($result_posts))
	{
		$posts[$i]=$r['reported_idPost'];
		$i++;
	}
	mysqli_close($con);
	// print_r($posts);
	echo json_encode($posts);

?>