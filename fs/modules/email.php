<?php
	include_once("../definelocal.php");
	include_once("../define.php");
	include_once("../time.php");
	include_once("../config.php");
	include_once("../fcomment.php");
	include_once("../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	// using with json
	$idPost = $_POST['idPost'];
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result_post=mysqli_query($con,"select user_email, user_link from atw_user" );	
	$i=0;
	while ($row = mysqli_fetch_array($result_post))
	{
		if($row['user_email']!=null & $row['user_email']!="")
		{			
			echo $row['user_email'].",<br/>";
		}
		$i++;
	}
	
	$result_post_FB=mysqli_query($con,"select user_email, user_link from atw_user" );
	echo "<br/><br/><br/>";
	$i=0;
	while ($row1 = mysqli_fetch_array($result_post_FB))
	{		
		echo "<a href='".$row1['user_link']."'>".$row1['user_link']."</a>,<br/>";
		$i++;
	}
	mysqli_close($con);	
	// print_r($posts);
	// header('Content-type: application/json');
?>
