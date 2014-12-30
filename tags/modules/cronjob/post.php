<?php
	include("../../config.php");
	include("../../user.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);
	$resultpost=mysqli_query($con,"Select post_id FROM atw_post");
	echo $resultpost->num_rows;
	$numdel=$resultpost->num_rows - 300;
	
	$listIds=mysqli_query($con,"SELECT post_id FROM atw_post  where post_id>1 and post_group=0 order by post_id desc limit 300,".$numdel);
	while ($rowId=mysqli_fetch_array($listIds))
	{
		//echo $rowId['post_id'];	
		mysqli_query($con,"DELETE FROM atw_post  where post_id=".$rowId['post_id']." limit 5");
		mysqli_query($con,"DELETE FROM atw_cmt_content  where IdArticles=".$rowId['post_id']);
		mysqli_query($con,"DELETE FROM atw_notify  where notify_id_post=".$rowId['post_id']);		
	}
	mysqli_close($con);
?>