<?php
//fix
	include("../config.php");
	function checkNotify()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idUser=$_POST['idUser'];
		$con=mysqli_connect($host,$user,$pass,$db);
		$result_notify=mysqli_query($con,"select check_notify_id_comment  from fs_check_notify where  check_notify_id_user=".$idUser);
		
		if($result_notify->num_rows >0)
		{
			$row_notify = mysqli_fetch_array($result_notify);
			$idLastCommentNotify = $row_notify['check_notify_id_comment'];
		}else
			$idLastCommentNotify=0;	
		$result=mysqli_query($con,"select * from atw_notify where notify_user_id =".$idUser."  and notify_id_comment > ".$idLastCommentNotify );
		if($result->num_rows >0)
		{
			echo $result->num_rows;
		}
		else
			echo 0;
	}

?>



