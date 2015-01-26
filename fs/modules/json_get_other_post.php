<?php
if(!isset($_SESSION)){
    session_start();
}
	include("../config.php");
	include("../user.php");
	include("../fcomment.php");
	include_once("../time.php");
	global $host;
	global $user;
	global $pass;
	global $db;
	$con=mysqli_connect($host,$user,$pass,$db);	
        $id_user=$_SESSION['session-user'];
	mysqli_set_charset($con, "utf8");
	$idPostStart = $_POST['lastPostDisplay'];
	
	$lIdPosts = split(",",$idPostStart);
	$q="";
	if (count($lIdPosts)>0 && $lIdPosts[0]!="")
		$q="post_id != ".$lIdPosts[0];
	for ($ii=1;$ii<count($lIdPosts);$ii++)
	{
		$q = $q. " and post_id != ".$lIdPosts[$ii];
	}
	$idgroup = 0;
	if (isset($_GET['idgroup']))
		$idgroup=$_GET['idgroup'];
	if ($idPostStart==-1)
	{
		$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and post_id>".$idPostStart." and post_group=".$idgroup." ORDER BY post_id DESC limit 5" );
	}
	else
	{
		if($q!="")
		{	
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and (".$q.") and post_group=".$idgroup." ORDER BY post_id DESC limit 50" );			
		
		}else
		{
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and post_group=".$idgroup." ORDER BY post_id DESC limit 50" );
		}
	}
	$countPost=1;
	$countPostAvailable=1;
	$i=0;
	$posts = array();
	$posts['post']=array();
	$posts['comment']=array();
	while (($row = mysqli_fetch_array($result_post)) && ($countPostAvailable<10))
	{
		if ($countPost%50==0 && $countPost!=$countPostAvailable)
		{
			$con=mysqli_connect($host,$user,$pass,$db);
			mysqli_set_charset($con, "utf8");
			$result_post=mysqli_query($con,"select * from atw_post where post_id<".$row['post_id']." and post_group=".$idgroup." ORDER BY post_id DESC limit 20" );
			$countPost=$countPostAvailable;			
		}
		if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
		{			
			
			$countPostAvailable++;	
			$post[$i]['idPost']=$row['post_id'];
			$q = $q. " and post_id != ".$row['post_id'];			
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
			$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=".$post[$i]['idPost']." ORDER BY Id DESC limit 10" );	
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
				$link11=getListUrl($row['Content']);
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
				$timezone  = +7; 
				$timeCurrent = time() + 3600*($timezone+date("0"));
				$timeSaved=strtotime($row1['Time']);  
				$comment[$i][$ii]['countTime']				=getTimeString($timeCurrent,$timeSaved);				
				$ii++;
			}
			$posts['post']=$post;
			$posts['comment']=$comment;			
			$i++;
		}
		$countPost++;
		
	}
	mysqli_close($con);
	// print_r($posts);
	echo json_encode($posts);
?>