<?php
// keke
	function saveUser($user_profile)
	{
		global $host;
		global $user;
		global $pass;
		global $db;	
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result=mysqli_query($con,"select user_id,user_time_join from atw_user where user_id=".$user_profile[id]);	
		
		if(!($result->num_rows>0))
		{
			$timezone  = +14;//+7; //(GMT +7:00) 
			$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
			
			if($user_profile[name]!="" &&$user_profile[id]!="")
			mysqli_query($con,"INSERT INTO atw_user (user_id,user_name,user_link,user_username,user_gender,user_email,user_location,user_work_employer,user_work_position,user_work_description,user_status,user_manager,birthday) VALUES ('".$user_profile[id]."','".$user_profile[name]."','".$user_profile[link]."','".$user_profile[username]."','".$user_profile[gender]."','".$user_profile[email]."','".$user_profile[location][name]."','".$user_profile[work][0][employer][name]."','".$user_profile[work][0][position][name]."','".$user_profile[work][0][description]."',1,0,'".$user_profile['birthday']."')");	
			mysqli_query($con,"insert into atw_point (idUser,point) values (".$user_profile[id].",50)");		
			mysqli_query($con,"INSERT INTO atw_notify ( notify_user_id,notify_user_name,notify_user_logo ,notify_id_post,notify_id_comment,notify_time,notify_content,notify_status) VALUES (".$user_profile[id].",'".$user_profile[name]."','"."https://graph.facebook.com/".$user_profile[id]."/picture"."',1,1,'".$datetime."','Chào mừng bạn đến với FaceSeo.Vn. Chạy thử nghiệm 3 tháng. Phí sử dụng hệ thống 500k/2năm. Các bạn cần giải pháp Seo hay phát triển thương hiệu online vui lòng liên hệ Linh Nguyễn.  ','0')");	
			$result_check_notify=mysqli_query($con,"insert into fs_check_notify (check_notify_id_user,check_notify_id_comment) values ('".$user_profile[id]."',0)" );
		}
		else
		{	if ($user_profile['birthday']!="")
				mysqli_query($con,"UPDATE atw_user SET birthday='".$user_profile['birthday']."' where user_id=".$user_profile[id]);
			if ($user_profile['user_ip']!="")
				mysqli_query($con,"UPDATE atw_user SET user_ip='".$user_profile['user_ip']."' where user_id=".$user_profile[id]);
			$row = mysqli_fetch_array($result);
			$timeJoin	=	date("H:i:s d/m/y");
			if ($row['user_time_join']=="")
					mysqli_query($con,"UPDATE atw_user SET user_time_join='".$timeJoin."' where user_id=".$user_profile[id]);
		}
		mysqli_close($con);
	}
	function getUserInfo($user_id)
	{
		global $host;
		global $user;
		global $pass;
		global $db;	
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result=mysqli_query($con,"select user_id,user_name,user_link,user_status,user_manager,birthday,user_gender from atw_user where user_id='".$user_id."'");	
		if($result->num_rows>0)
			$row = mysqli_fetch_array($result);
		$userinfo=array();
		$userinfo['user_id']=$row['user_id'];
		$userinfo['user_name']=$row['user_name'];
		$userinfo['user_link']=$row['user_link'];
		$userinfo['user_status']=$row['user_status'];
		$userinfo['user_manager']=$row['user_manager'];
		$userinfo['birthday']=$row['birthday'];
		$userinfo['user_gender']=$row['user_gender'];
		
		$result=mysqli_query($con,"select point from atw_point where idUser='".$user_id."'");	
		if($result->num_rows>0)
			$row = mysqli_fetch_array($result);	
		$userinfo['user_point']=$row['point'];
		mysqli_close($con);
		return $userinfo;
	}
?>
