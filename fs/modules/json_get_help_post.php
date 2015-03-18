<?php
if(!isset($_SESSION)){
    session_start();
}
	include_once("../definelocal.php");
	include_once("../define.php");
	include_once("../time.php");
	include_once("../config.php");
	include_once("../fcomment.php");
	include_once("../user.php");
	$NUMPOSTLOAD = 20;
	global $host;
	global $user;
	global $pass;
	global $db;
	$qidUser ="";
	$start =0;
	$countpost=0;
	$qidPost="";
	$idPostGroup=0;
	if (isset($_GET['idgroup']))
		$idPostGroup=$_GET['idgroup'];
	if (isset ($_POST['iPageUIDHelpYou']) && $_POST['iPageUIDHelpYou']!="")
	{
		$_SESSION['iPageUIDHelpYou'] = $_POST['iPageUIDHelpYou'];
	}
	else 
		$_SESSION['iPageUIDHelpYou'] = 0;
	$start= $_SESSION['iPageUIDHelpYou']*$NUMPOSTLOAD;
	$IdPostDisPlay = "";
	if (isset ($_SESSION['userHelpYou']))
	{
		$listIDUser=$_SESSION['userHelpYou'];
		if (count($listIDUser)> $start)
		{
			$qidPost1="";
			$qidUser= " post_iduser=".$listIDUser[$start];			
			for ($ii=$start + 1;$ii<count($listIDUser);$ii++)
			{
				if ($ii%$NUMPOSTLOAD==0)
				{
					break;
				}
				$qidUser=$qidUser. " or post_iduser=".$listIDUser[$ii];
				$ridposts=mysqli_query($con,"select post_id from atw_post where post_iduser=".$listIDUser[$ii]." and post_group=".$idPostGroup." ORDER BY post_id DESC limit 2,1");		
				if ($ridposts->num_rows>0)
				{
					$row = mysqli_fetch_array($ridposts);
					if ($qidPost1!="")
						$qidPost1 = $qidPost1. " or  post_id=".$row[0];
					else
						$qidPost1 = "post_id=".$row[0];
				};
			}	
		}		
	}
	else
		$listIDUser = "";
	$posts = array();
	$posts['post']=array();
	$posts['comment']=array();
	$i=0;
	if ($listIDUser!="" && $qidUser!="")
	{
		$idPost = $_POST['idPost'];
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		/* GET MY POST */
		$ridposts=mysqli_query($con,"select post_id  from atw_post where post_iduser=".$_SESSION['session-user']." and post_group=".$idPostGroup." order by post_id desc limit 1");
		
		if ($ridposts->num_rows>0)
		{
			$row = mysqli_fetch_array($ridposts);
			$qidPost = "post_id=".$row[0];
		}
		while ($row = mysqli_fetch_array($ridposts))
		{
			$qidPost=$qidPost." or post_id=".$row[0];
		}		
		if ($qidPost!="" && $_SESSION['iPageUIDHelpYou'] == 0)
		{
			
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and (".$qidPost.") and post_group=".$idPostGroup."  group by post_id ORDER BY post_id DESC" );
			while ($row = mysqli_fetch_array($result_post))
			{
				if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
				{			
					$IdPostDisPlay="post_id!=".$row['post_id'];
					$post[$i]['idPost']=$row['post_id'];
					$post[$i]['user_id']=$row['post_iduser'];
					$post[$i]['post_title']=$row['post_title'];
					$infosUser=getUserInfo($post[$i]['user_id']);
					$infosUserUserSetting=getUserSetting($post[$i]['user_id']);
					$post[$i]['user_link']=$infosUser['user_link'];
					$post[$i]['user_name']=$infosUser['user_name'];
					$post[$i]['user_point']=$infosUser['user_point'];
					$post[$i]['post_content']=$row['post_content'];
					$post[$i]['post_image']=$row['post_image'];
					$post[$i]['post_url']=$row['post_url'];
					$post[$i]['post_full_url']=$row['post_full_url'];					
					

					$t=date("h:i:s d-m-Y");
					$timeCurrent = strtotime($t); $timeSaved=strtotime($row['post_time']);
					$post[$i]['post_time']	=getTimeString($timeCurrent,$timeSaved);					
					$post[$i]['post_realtime']	=$row['post_time'];
					
					$link=$post[$i]['post_full_url']==""?$post[$i]['post_url']:$post[$i]['post_full_url'];			
					$post[$i]['post_num_view']=getNumView($link);			
					$post[$i]['post_mintimeview']=$row['post_mintimeviewlink'];	
					if (count($infosUserUserSetting) >0)
						$post[$i]['linkgplus']=$infosUserUserSetting['setting_linkg1'];
					else 
						$post[$i]['linkgplus']="";
					//info comment
					$con=mysqli_connect($host,$user,$pass,$db);
					mysqli_set_charset($con, "utf8");
					$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=".$post[$i]['idPost']." ORDER BY Id DESC " );	
					$comment[$i]=array();
					$ii=0; 
					while( ($row1 = mysqli_fetch_array($result)) ){
						$infosUser1=getUserInfo($row1['userId']);		
						$comment[$i][$ii]['cmt_Id'] 			=$row1['Id'];
						$comment[$i][$ii]['cmt_userId'] 			=$row1['userId'];
						$comment[$i][$ii]['cmt_imgLogo']		=$row1['imgLogo'];
						$comment[$i][$ii]['cmt_user_link']	=$infosUser1['user_link'];
						$comment[$i][$ii]['cmt_name']		=$infosUser1['user_name'];
						$comment[$i][$ii]['cmt_user_point']	=$infosUser1['user_point'];
						$comment[$i][$ii]['cmt_Content']		=$row1['Content'];
						$link11=getListUrl($row1['Content']);
						if (count($link11)>0)
							$alllink=$link11[0];
						else
							$alllink="";
						for ($jjj=1;$jjj<count($link11);$jjj++)
						{
							$alllink =$alllink."····".$link11[$jjj];
						}				
						$comment[$i][$ii]['cmt_url']			=$alllink;
						$result_like=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']);
						$result_mylike=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']. " and idUser=".$id_user);
						$num_like = $result_like->num_rows;
						$num_mylike = $result_mylike->num_rows;
						$comment[$i][$ii]['cmt_num_like']	=($num_like==""?0:$num_like);
						$comment[$i][$ii]['cmt_my_like']		=($num_mylike==""?0:$num_mylike);
						$comment[$i][$ii]['Time']				=date("h:i:s d-m-Y",$row1['Time']);				
						$timezone  = +7; $timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row1['Time']);
						$comment[$i][$ii]['countTime']				=getTimeString($timeCurrent,$timeSaved);				
						$ii++;
					}
					$posts['post']=$post;
					$posts['comment']=$comment;
					$i++;
				}
				
			}

		}
		
		/* END GET MY POST */
		
		$ridposts=mysqli_query($con,"select max(post_id) postId from atw_post where $qidUser  and post_group=".$idPostGroup." group by post_iduser ORDER BY post_id DESC");
		$qidPost="";
		if ($ridposts->num_rows>0)
		{
			$row = mysqli_fetch_array($ridposts);
			$qidPost = "post_id=".$row[0];
		}
		while ($row = mysqli_fetch_array($ridposts))
		{
			$qidPost=$qidPost." or post_id=".$row[0];
		}		
		if ($qidPost=="")
		$qidPost=$qidPost1;
		if ($qidPost!="")
		{
			$qidPost = $qidPost." or ".$qidPost;
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and (".$qidPost.") and post_group=".$idPostGroup );
			while (($row = mysqli_fetch_array($result_post)) && ($countpost <9))
			{
				
				if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
				{			
					if ($IdPostDisPlay!="")
						$IdPostDisPlay=$IdPostDisPlay." and post_id!=".$row['post_id'];
					else
						$IdPostDisPlay="post_id!=".$row['post_id'];
					$post[$i]['idPost']=$row['post_id'];
					$post[$i]['user_id']=$row['post_iduser'];
					$post[$i]['post_title']=$row['post_title'];
					$infosUser=getUserInfo($post[$i]['user_id']);
					$infosUserUserSetting=getUserSetting($post[$i]['user_id']);
					$post[$i]['user_link']=$infosUser['user_link'];
					$post[$i]['user_name']=$infosUser['user_name'];
					$post[$i]['user_point']=$infosUser['user_point'];
					$post[$i]['post_content']=$row['post_content'];
					$post[$i]['post_image']=$row['post_image'];
					$post[$i]['post_url']=$row['post_url'];
					$post[$i]['post_full_url']=$row['post_full_url'];	

					$t=date("h:i:s d-m-Y");
					$timeCurrent = strtotime($t); $timeSaved=strtotime($row['post_time']);
					$post[$i]['post_time']	=getTimeString($timeCurrent,$timeSaved);					
					$post[$i]['post_realtime']	=$row['post_time'];
					
					
					$link=$post[$i]['post_full_url']==""?$post[$i]['post_url']:$post[$i]['post_full_url'];			
					$post[$i]['post_num_view']=getNumView($link);			
					$post[$i]['post_mintimeview']=$row['post_mintimeviewlink'];	
					if (count($infosUserUserSetting) >0)
						$post[$i]['linkgplus']=$infosUserUserSetting['setting_linkg1'];
					else 
						$post[$i]['linkgplus']="";
					//info comment
					$con=mysqli_connect($host,$user,$pass,$db);
					mysqli_set_charset($con, "utf8");
					$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=".$post[$i]['idPost']." ORDER BY Id DESC " );	
					$comment[$i]=array();
					$ii=0; 
					while( ($row1 = mysqli_fetch_array($result)) ){
						$infosUser1=getUserInfo($row1['userId']);		
						$comment[$i][$ii]['cmt_Id'] 			=$row1['Id'];
						$comment[$i][$ii]['cmt_userId'] 			=$row1['userId'];
						$comment[$i][$ii]['cmt_imgLogo']		=$row1['imgLogo'];
						$comment[$i][$ii]['cmt_user_link']	=$infosUser1['user_link'];
						$comment[$i][$ii]['cmt_name']		=$infosUser1['user_name'];
						$comment[$i][$ii]['cmt_user_point']	=$infosUser1['user_point'];
						$comment[$i][$ii]['cmt_Content']		=$row1['Content'];
						$link11=getListUrl($row1['Content']);
						if (count($link11)>0)
							$alllink=$link11[0];
						else
							$alllink="";
						for ($jjj=1;$jjj<count($link11);$jjj++)
						{
							$alllink =$alllink."····".$link11[$jjj];
						}				
						$comment[$i][$ii]['cmt_url']			=$alllink;
						$result_like=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']);
						$result_mylike=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']. " and idUser=".$id_user);
						$num_like = $result_like->num_rows;
						$num_mylike = $result_mylike->num_rows;
						$comment[$i][$ii]['cmt_num_like']	=($num_like==""?0:$num_like);
						$comment[$i][$ii]['cmt_my_like']		=($num_mylike==""?0:$num_mylike);
						$comment[$i][$ii]['Time']				=date("h:i:s d-m-Y",$row1['Time']);				
						$timezone  = +7; $timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row1['Time']);  getTimeString($timeCurrent,$timeSaved);
						$comment[$i][$ii]['countTime']				=getTimeString($timeCurrent,$timeSaved);				
						$ii++;
					}
					$posts['post']=$post;
					$posts['comment']=$comment;
					$countpost = $countpost + 1;
					$i++;
				}
				
			}
		}
	}
	if($countpost <9 && ($qidPost!="" && $_SESSION['iPageUIDHelpYou'] == 0))
	{
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and post_group=".$idPostGroup." ORDER BY post_id DESC limit 100" );
			if ($IdPostDisPlay!="")
				$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and ".$IdPostDisPlay." and post_group=".$idPostGroup." ORDER BY post_id DESC limit 100" );
			
			while (($row = mysqli_fetch_array($result_post)) && ($countpost <9))
			{
				if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
				{								
					$post[$i]['idPost']=$row['post_id'];
					$post[$i]['user_id']=$row['post_iduser'];
					$post[$i]['post_title']=$row['post_title'];
					$infosUser=getUserInfo($post[$i]['user_id']);
					$infosUserUserSetting=getUserSetting($post[$i]['user_id']);
					$post[$i]['user_link']=$infosUser['user_link'];
					$post[$i]['user_name']=$infosUser['user_name'];
					$post[$i]['user_point']=$infosUser['user_point'];
					$post[$i]['post_content']=$row['post_content'];
					$post[$i]['post_image']=$row['post_image'];
					$post[$i]['post_url']=$row['post_url'];
					$post[$i]['post_full_url']=$row['post_full_url'];	

					$t=date("h:i:s d-m-Y");
					$timeCurrent = strtotime($t); $timeSaved=strtotime($row['post_time']);
					$post[$i]['post_time']	=getTimeString($timeCurrent,$timeSaved);					
					$post[$i]['post_realtime']	=$row['post_time'];
					
					
					$link=$post[$i]['post_full_url']==""?$post[$i]['post_url']:$post[$i]['post_full_url'];			
					$post[$i]['post_num_view']=getNumView($link);			
					$post[$i]['post_mintimeview']=$row['post_mintimeviewlink'];	
					if (count($infosUserUserSetting) >0)
						$post[$i]['linkgplus']=$infosUserUserSetting['setting_linkg1'];
					else 
						$post[$i]['linkgplus']="";
					//info comment
					$con=mysqli_connect($host,$user,$pass,$db);
					mysqli_set_charset($con, "utf8");
					$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=".$post[$i]['idPost']." ORDER BY Id DESC " );	
					$comment[$i]=array();
					$ii=0; 
					while( ($row1 = mysqli_fetch_array($result)) ){
						$infosUser1=getUserInfo($row1['userId']);		
						$comment[$i][$ii]['cmt_Id'] 			=$row1['Id'];
						$comment[$i][$ii]['cmt_userId'] 			=$row1['userId'];
						$comment[$i][$ii]['cmt_imgLogo']		=$row1['imgLogo'];
						$comment[$i][$ii]['cmt_user_link']	=$infosUser1['user_link'];
						$comment[$i][$ii]['cmt_name']		=$infosUser1['user_name'];
						$comment[$i][$ii]['cmt_user_point']	=$infosUser1['user_point'];
						$comment[$i][$ii]['cmt_Content']		=$row1['Content'];
						$link11=getListUrl($row1['Content']);
						if (count($link11)>0)
							$alllink=$link11[0];
						else
							$alllink="";
						for ($jjj=1;$jjj<count($link11);$jjj++)
						{
							$alllink =$alllink."····".$link11[$jjj];
						}				
						$comment[$i][$ii]['cmt_url']			=$alllink;
						$result_like=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']);
						$result_mylike=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']. " and idUser=".$id_user);
						$num_like = $result_like->num_rows;
						$num_mylike = $result_mylike->num_rows;
						$comment[$i][$ii]['cmt_num_like']	=($num_like==""?0:$num_like);
						$comment[$i][$ii]['cmt_my_like']		=($num_mylike==""?0:$num_mylike);
						$comment[$i][$ii]['Time']				=date("h:i:s d-m-Y",$row1['Time']);				
						$timezone  = +7; $timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row1['Time']);  getTimeString($timeCurrent,$timeSaved);
						$comment[$i][$ii]['countTime']				=getTimeString($timeCurrent,$timeSaved);				
						$ii++;
					}
					$posts['post']=$post;
					$posts['comment']=$comment;
					$countpost = $countpost + 1;
					$i++;
				}
				
			}
			mysqli_close($con);
	};
	$posts['uidhelpyou']="";
	if (count($listIDUser)>$start)
	{
		$posts['uidhelpyou']=$_SESSION['iPageUIDHelpYou'] + 1;
	}
	// print_r($posts);
	// header('Content-type: application/json');
	echo json_encode($posts);
	// select max(post_id) postId from atw_post where post_iduser =100001707050712 or post_iduser=100005640848020 group by post_iduser
	// get danh sách IDPost cần.
	// Sau đó lọc ra danh sách mình cần
	// Mysql hay http://tuhocanninhmang.com/lamp-wamp/sql-mysql/mysql-bai-12-ham-mysql-sum-max-min-avg-count.htm
	// Phải check số lượng post đã hiển thị
?>
