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
	$numCmtDisplay=$_POST['numCmtDisplay'];
	if(isset($_POST['idArt']))
	{
		$id = $_POST['idArt'];
	}
	$con=mysqli_connect($host,$user,$pass,$db);
	mysqli_set_charset($con, "utf8");
	$result=mysqli_query($con,"select * from atw_cmt_content where IdArticles=$id ORDER BY Id DESC ");	
	$comment=array();
	$ii=0; 
	while( ($row1 = mysqli_fetch_array($result)) ){
		$infosUser1=getUserInfo($row1['userId']);		
		$comment[$ii]['cmt_Id'] 			=$row1['Id'];
		$comment[$ii]['cmt_imgLogo']		=$row1['imgLogo'];
		$comment[$ii]['cmt_user_link']	=$infosUser1['user_link'];
		$comment[$ii]['cmt_name']		=$infosUser1['user_name'];
		$comment[$ii]['cmt_user_point']	=$infosUser1['user_point'];
		$comment[$ii]['cmt_Content']		=$row1['Content'];
		$link11=getListUrl($row1['Content']);
		if (count($link11)>0)
			$alllink=$link11[0];
		else
			$alllink="";
		for ($jjj=1;$jjj<count($link11);$jjj++)
		{
			$alllink =$alllink."····".$link11[$jjj];
		}				
		$comment[$ii]['cmt_url']			=$alllink;
		$result_like=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']);
		$result_mylike=mysqli_query($con,"select * from atw_like_cmt where idCmt=".$row1['Id']. " and idUser=".$id_user);
		$num_like = $result_like->num_rows;
		$num_mylike = $result_mylike->num_rows;
		$comment[$ii]['cmt_num_like']	=($num_like==""?0:$num_like);
		$comment[$ii]['cmt_my_like']		=($num_mylike==""?0:$num_mylike);
		$comment[$ii]['Time']				=date("h:i:s d-m-Y",$row1['Time']);				
		$timezone  = +7; $timeCurrent = time() + 3600*($timezone+date("0")); $timeSaved=strtotime($row1['Time']);  getTimeString($timeCurrent,$timeSaved);
		$comment[$ii]['countTime']				=getTimeString($timeCurrent,$timeSaved);				
		$ii++;
	}		
	mysqli_close($con);	
	// print_r($posts);
	// header('Content-type: application/json');
	echo json_encode($comment);
?>
