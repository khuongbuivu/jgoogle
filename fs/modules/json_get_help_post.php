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
	$NUMPOSTLOAD = 5;
	if (!isset($_SESSION['iPageUIDHelpYou']))
		$_SESSION['iPageUIDHelpYou']=0;
	else
		$_SESSION['iPageUIDHelpYou']=($_SESSION['iPageUIDHelpYou'] + 1)*$NUMPOSTLOAD;
	global $host;
	global $user;
	global $pass;
	global $db;
	// using with json
	// $ll="100001707050712,100005640848020,100005638054455,100006197473333,100004423232266,100006276192136,100004043834368";
	$qidUser ="";
	$start =0;
	if (isset ($_SESSION['userHelpYou']))
	{
		$listIDUser=$_SESSION['userHelpYou'];
		if (count($listIDUser)>$_SESSION['iPageUIDHelpYou'])
		{
			$qidUser= " post_iduser=".$listIDUser[$_SESSION['iPageUIDHelpYou']];
			$start= $_SESSION['iPageUIDHelpYou'] + 1;
			for ($ii=$start;$ii<count($listIDUser);$ii++)
			{
				if ($ii%$NUMPOSTLOAD==0)
				{
					break;
				}
				$qidUser=$qidUser. " or post_iduser=".$listIDUser[$ii];
			}
		}
		
		
	}
	else
		$listIDUser = "";
	$posts = array();
	$posts['post']=array();
	$posts['comment']=array();
	if ($listIDUser!="" && $qidUser!="")
	{
		$idPost = $_POST['idPost'];
		$con=mysqli_connect($host,$user,$pass,$db);
		mysqli_set_charset($con, "utf8");
		$ridposts=mysqli_query($con,"select max(post_id) postId from atw_post where $qidUser group by post_iduser");
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
		if ($qidPost!="")
		{
			$result_post=mysqli_query($con,"select * from atw_post,atw_user  where post_iduser=user_id and (".$qidPost.")  group by post_id ORDER BY post_id DESC" );
			$i=0;
			while ($row = mysqli_fetch_array($result_post))
			{
				if (checkAvailableLinks($row['post_url'],$id_user) && checkAvailableLinks($row['post_full_url'],$id_user))
				{			
					$post[$i]['idPost']=$row['post_id'];
					$post[$i]['user_id']=$row['post_iduser'];
					$post[$i]['post_title']=$row['post_title'];
					$infosUser=getUserInfo($post[$i]['user_id']);
					$post[$i]['user_link']=$infosUser['user_link'];
					$post[$i]['user_name']=$infosUser['user_name'];
					$post[$i]['user_point']=$infosUser['user_point'];
					$post[$i]['post_content']=$row['post_content'];
					$post[$i]['post_image']=$row['post_image'];
					$post[$i]['post_url']=$row['post_url'];
					$post[$i]['post_full_url']=$row['post_full_url'];			
					$link=$post[$i]['post_full_url']==""?$post[$i]['post_url']:$post[$i]['post_full_url'];			
					$post[$i]['post_num_view']=getNumView($link);			
					//info comment
					$con=mysqli_connect($host,$user,$pass,$db);
					mysqli_set_charset($con, "utf8");
					$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=".$post[$i]['idPost']." ORDER BY Id DESC " );	
					$comment[$i]=array();
					$ii=0; 
					while( ($row1 = mysqli_fetch_array($result)) ){
						$infosUser1=getUserInfo($row1['userId']);		
						$comment[$i][$ii]['cmt_Id'] 			=$row1['Id'];
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
				}
				$posts['post']=$post;
				$posts['comment']=$comment;	
				
				$i++;
			}
			mysqli_close($con);	
		}
	}
	$posts['uidhelpyou']="";
	if (count($listIDUser)>($_SESSION['iPageUIDHelpYou'] + 1)*$NUMPOSTLOAD)
	{
		$posts['uidhelpyou']="ok";
	}
	//print_r($posts);
	// header('Content-type: application/json');
	echo json_encode($posts);
	// select max(post_id) postId from atw_post where post_iduser =100001707050712 or post_iduser=100005640848020 group by post_iduser
	// get danh sách IDPost cần.
	// Sau đó lọc ra danh sách mình cần
	// Mysql hay http://tuhocanninhmang.com/lamp-wamp/sql-mysql/mysql-bai-12-ham-mysql-sum-max-min-avg-count.htm
?>
