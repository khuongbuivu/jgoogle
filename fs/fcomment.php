<?php
if(!isset($_SESSION)){
    session_start();
}
	include_once("config.php");
	require_once('system/function.php');
	function saveComment()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idArt		=$_POST['idArt'];
		$cmt_content=$_POST['cmt_content'];
		$cmt_img=$_POST['cmt_img'];
		$imgLogo	=$_POST['imgLogo'];
		$name	=$_POST['name'];
		$name	=$_POST['name'];
		$timezone  = +14;//+7; //(GMT +7:00) 
		$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$cmt_content = addLinkUrl($cmt_content).$cmt_img;		
		if($cmt_content!="")
			mysqli_query($con,"INSERT INTO atw_cmt_content (IdArticles,Content,Time,imgLogo, userId,name) VALUES (".$idArt.",'".$cmt_content."','".$datetime."','".$imgLogo."' , '".$_SESSION['session-user']."', '".$name."')");	
		mysqli_close($con);
	}
	function saveLike()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$idCmt		=$_POST['idCmt'];
		$idUser		=$_POST['idUser'];
		$timezone  = +14; //(GMT +7:00) 
		$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$idCmt." and idUser=".$idUser);
		if($result->num_rows=="" || $result->num_rows==0)
			echo 0;
		else
			echo 1;
		//echo $result->num_rows;
		if ($result->num_rows==0 )
		{
			$infoCmt=getInfoComment($idCmt);
			mysqli_query($con,"INSERT INTO atw_like_cmt (idCmt,idUser,time,tmp) VALUES (".$idCmt.",'".$idUser."','".$datetime."','')");
			if ($infoCmt['cmtUserId']!=$_SESSION['session-user'])
			{
				
				$ImageLogo='https://graph.facebook.com/'.$_SESSION['session-user'].'/picture';
				$userNameLike=$_SESSION['session-name'];
				if ($infoCmt['cmtContent'].count>70)
				{
					$shortContent=substr($content, 70);
					$content = " <i>thích</i>: ". $shortContent."...";
				}
				else
					$content =" <i>thích</i>: ".$infoCmt['cmtContent'];				
				mysqli_query($con,"INSERT INTO atw_notify ( notify_user_id,notify_user_name,notify_user_logo ,notify_id_post,notify_id_comment,notify_time,notify_content,notify_status,notify_type) VALUES (".$infoCmt['cmtUserId'].",'".$userNameLike."','".$ImageLogo."',".$infoCmt['cmtIdPost'].",".$idCmt.",'".$datetime."','".$content."','".$status."',0)");
			}
		}
		else 
			mysqli_query($con,"DELETE FROM atw_like_cmt where idCmt=".$idCmt." and idUser=".$idUser);		
		mysqli_close($con);
		
	}
	function getInfoComment($idCmt)
	{
		global $host;
		global $user;
		global $pass;
		global $db;	
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$result=mysqli_query($con,"select userId,IdArticles,name,imgLogo,Content from atw_cmt_content where Id=".$idCmt." limit 1 ");
		$infoCmt=array();
		if ($result->num_rows>0 )
		{
			$row = mysqli_fetch_array($result);
			$infoCmt['cmtUserId']=$row['userId'];						
			$infoCmt['cmtUserName']=$row['name'];
			$infoCmt['cmtUserLogo']=$row['imgLogo'];
			$infoCmt['cmtContent']=$row['Content'];
			$infoCmt['cmtIdPost']=$row['IdArticles'];

		}			
		mysqli_close($con);
		return $infoCmt;
	}
	function saveLink()
	{
		global $host;
		global $user;
		global $pass;
		global $db;	
		$cmt_content=$_POST['cmt_content'];
		$iduser=$_POST['iduser'];
		$listUrls		=getListUrl($cmt_content);
		$con=mysqli_connect($host,$user,$pass,$db);
        
		foreach($listUrls as $url) {
			$result=mysqli_query($con,"select url from awt_list_url where idUser='".$iduser."' and url='".$url."'");	
			if(!($result->num_rows>0))
				mysqli_query($con,"INSERT INTO awt_list_url (url,iduser) VALUES ('".$url."','".$iduser."')");	
		}
		mysqli_close($con);
	}
	function saveNotify()
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		//url, idUser, userName, idArt, content, status
		$idUser		=$_POST['idUser'];
		$userName		=$_POST['userName'];
		$userLogo		=$_POST['userLogo'];
		$idArt		=$_POST['idArt'];
		$idCommentPost		=$_POST['idCommentPost'];
		$content		=$_POST['content'];
		$status		=$_POST['status'];
		$timezone  = +14;//+7; //(GMT +7:00) 
		$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		// field database
		// atw_notify_id,atw_notify_user_id,atw_notify_user_name,atw_notify_id_post
		// atw_notify_time
		// atw_notify_content
		// atw_notify_status   //read or no
		$CommentMaxCurrent = mysqli_query($con,"select Id from atw_cmt_content order by Id desc limit 1");
		$rowCommentMaxCurrent = mysqli_fetch_array($CommentMaxCurrent);
		$idCommentPost = $rowCommentMaxCurrent['Id'];
		
		$query_id_user = "Select post_id,post_iduser from atw_post where post_id=".$idArt. " and post_iduser!=".$idUser;
		$result= mysqli_query($con,$query_id_user);
		if ($result->num_rows>0)
		{
			while ($row = mysqli_fetch_array($result))
			{
				$idUser=$row['post_iduser'];
			}	
			//echo "INSERT INTO atw_notify ( atw_notify_user_id,atw_notify_user_name,atw_notify_user_logo ,atw_notify_id_post,atw_notify_time,atw_notify_content,atw_notify_status) VALUES (".$idUser.",'".$userName."','".$userLogo."',".$idArt.",'".$datetime."','".$content."','".$status."'";
			//echo $query_id_user;
			if ($content.count>50)
			{
				$shortContent=substr($content, 50);
				$content = " nhắc đến bạn \" ". $shortContent."\"...";
			}
			else
				$content = " nhắc đến bạn \" ". $content."\"";	
			$listUsers= mysqli_query($con,'SELECT userId,name FROM atw_cmt_content WHERE idArticles='.$idArt.' and userId!='.$_SESSION['session-user'].' group by userId');			 

			if ($listUsers->num_rows>0)
			{
				while ($row3 = mysqli_fetch_array($listUsers))
				{
					$idUser=$row3['userId'];
					//$userLogo = 'https://graph.facebook.com/'.$idUser.'/picture';
					mysqli_query($con,"INSERT INTO atw_notify ( notify_user_id,notify_user_name,notify_user_logo ,notify_id_post,notify_id_comment,notify_time,notify_content,notify_status,notify_type) VALUES (".$idUser.",'".$userName."','".$userLogo."',".$idArt.",".$idCommentPost.",'".$datetime."','".$content."','".$status."',1)");		
				}	
			}
			else
			{
				mysqli_query($con,"INSERT INTO atw_notify ( notify_user_id,notify_user_name,notify_user_logo ,notify_id_post,notify_id_comment,notify_time,notify_content,notify_status,notify_type) VALUES (".$idUser.",'".$userName."','".$userLogo."',".$idArt.",".$idCommentPost.",'".$datetime."','".$content."','".$status."',1)");
			}
			
		}	
			mysqli_close($con);
	}
	function checkUrlImage($url)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png", "bmp");
		$temp = explode(".", $url);
		if (count($temp)>0)
		{
			$extension = end($temp);
			$extension = strtolower($extension);
			if(in_array($extension, $allowedExts))
				return true;
		}
		return false;
		
	}
	function getNumView($link)
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$urls=split("····",$link);
		if(count($urls)>0)
		{
			$urls[0]=rtrim($urls[0], "/");
			$q='link =\''.$urls[0];
			for ($ii=1;$ii<count($urls);$ii++)
			{
				$urls[$ii]=rtrim($urls[$ii], "/");
				$q=$q.'\' or link =\''.$urls[$ii];
			
			}
			$q=$q.'\'';
		}
		else 
		{
			$link=rtrim($link, "/");
			$q=$link;
		}
		$currentDay = date("d/m/y");
		//echo 'select * from atw_click_link where ( '.$q.' ) and timestart like "%'.$currentDay.'%" order by id desc';
		$result=mysqli_query($con,'select * from atw_click_link where ( '.$q.' ) and timestart like "%'.$currentDay.'%" order by id desc');	
		mysqli_close($con);	
		if ($result->num_rows>0)
			return $result->num_rows;	
		else
			return 0;
		
	}
	function checkAvailableLinks($link,$idUser)
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$urls=split("····",$link);
		for ($ii=0;$ii<count($urls);$ii++)
		{
			//echo 'select SUM(ip_click_link_numview) as numview from fs_ip_click_link where  ip_click_link_url="'.$urls[$ii].'" and ip_click_link_id_user="'.$idUser.'" ';
			$urls[$ii]=rtrim($urls[$ii], "/");
/*
$arruser=mysqli_query($con,"select iduser from awt_list_url where url like '%".$urls[$ii]."%'  limit 1 ");
			//echo "select iduser from awt_list_url where url like '%".$urls[$ii]."%' limit 1";
			if($arruser->num_rows>0)
			{
				$row11 = mysqli_fetch_array($arruser);
				$idUserOfUrl = $row11[0];
			}
			//echo $idUserOfUrl." ".$idUser;
			
			if ($idUserOfUrl==$idUser)
			{
				
				return true;
			}
*/
			$result=mysqli_query($con,'select SUM(ip_click_link_numview) as numview from fs_ip_click_link where  ip_click_link_url="'.$urls[$ii].'" and ip_click_link_id_user="'.$idUser.'" ');			
			if ($result->num_rows>0)
			{
				$row = mysqli_fetch_array($result);
				if($row['numview']>1)
				{
					return false;
				}		
			}
		}
		return true;
		
	}
	function checkAvailableLink($link,$idUser)
	{
		global $host;
		global $user;
		global $pass;
		global $db;
		$con=mysqli_connect($host,$user,$pass,$db);
		$link=rtrim($link, "/");
		$result=mysqli_query($con,'select SUM(ip_click_link_numview) as numview from fs_ip_click_link where  ip_click_link_url="'.$link.'" and ip_click_link_id_user="'.$idUser.'" ');			
		if ($result->num_rows>0)
		{
			$row = mysqli_fetch_array($result);
			if($row['numview']>1)
			{
				return false;
			}		
		}
		return true;
		
	}
?>