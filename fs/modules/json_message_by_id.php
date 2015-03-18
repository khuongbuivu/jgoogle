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
	$result_post=mysqli_query($con,"select * from fs_message_content,atw_user  where msct_iduser=user_id and msct_id = $idPost  ORDER BY msct_id DESC " );	
	$i=0;
	while ($row = mysqli_fetch_array($result_post))
	{
		
		{			
			$post[$i]['idPost']=$row['msct_id'];
			$post[$i]['user_id']=$row['msct_iduser'];
			$post[$i]['post_title']="";
			$infosUser=getUserInfo($post[$i]['user_id']);
			$post[$i]['user_link']=$infosUser['user_link'];
			$post[$i]['user_name']=$infosUser['user_name'];
			$post[$i]['user_point']=$infosUser['user_point'];
			$post[$i]['post_content']=$row['msct_content'];
			$post[$i]['post_image']="";
			$post[$i]['post_url']="";
			$post[$i]['post_full_url']="";	

			$t=date("h:i:s d-m-Y");
			$timeCurrent = strtotime($t); $timeSaved=strtotime($row['post_time']);
			$post[$i]['post_time']	=getTimeString($timeCurrent,$timeSaved);					
			$post[$i]['post_realtime']	=$row['post_time'];
					
			
			$link=$post[$i]['post_full_url']==""?$post[$i]['post_url']:$post[$i]['post_full_url'];				
			$post[$i]['post_num_view']=0;
			$post[$i]['post_mintimeview']=300;	
			//info comment
			$con=mysqli_connect($host,$user,$pass,$db);
			mysqli_set_charset($con, "utf8");
			$comment[$i]=array();
			$ii=0; 
			
		}
		$posts['post']=$post;
		$posts['comment']=$comment;			
		$i++;
	}
	mysqli_close($con);	
	// print_r($posts);
	// header('Content-type: application/json');
	echo json_encode($posts);
?>
