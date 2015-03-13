<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('../definelocal.php');
require_once('../system/function.php');
require_once('../config.php');
require_once('../user.php');
global $host;
global $user;
global $pass;
global $db;
$con=mysqli_connect($host,$user,$pass,$db);
mysqli_set_charset($con, "utf8");
$idMaxPost = getIdMax("fs_message_content", "msct_id");
$idMaxPost = $idMaxPost + 1;
// $content = $_GET['content'];
$content = "TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE TEST ADD MESSAGE ";
$query_post="INSERT INTO fs_message_content (msct_id, msct_iduser, msct_content) VALUES (".$idMaxPost.", ".$_SESSION['session-user'].", '".$content."' )";	
mysqli_query($con,$query_post);
$UIDS=getUIDS('atw_user','user_id');
$userName = $_SESSION['session-name'];
$userLogo = 'https://graph.facebook.com/'.$_SESSION['session-user'].'/picture';
$datetime = gmdate("Y-m-d H:i:s", time() + 3600*($timezone+date("0")));
$status	=1;
$infoUser=getUserInfo($_SESSION['session-user']);
if ($infoUser['user_manager']!=3)
	exit();
$idCommentPost = -1;
if (strlen($content)>50)
{
	$shortContent=substr($content, 50);
	$content = " nhắc đến bạn \" ". $shortContent."\"...";
}
else
	$content = " nhắc đến bạn \" ". $content."\"";	
$message_id=getIdMax("fs_fs_message", "message_id");
for ($i=0;$i<2;$i++)
{
	echo "INSERT INTO fs_message (message_id, message_user_id,message_user_name,message_user_logo ,message_id_post,message_id_comment,message_time,message_content,message_status,message_type) VALUES(".$message_id.",".$UIDS[$i].",'".$userName."','".$userLogo."',".$idMaxPost.",".$idCommentPost.",'".$datetime."','".$content."','".$status."',1)";
	mysqli_query($con,"INSERT INTO fs_message (message_id, message_user_id,message_user_name,message_user_logo ,message_id_post,message_id_comment,message_time,message_content,message_status,message_type) VALUES(".$message_id.",".$UIDS[$i].",'".$userName."','".$userLogo."',".$idMaxPost.",".$idCommentPost.",'".$datetime."','".$content."','".$status."',1)");
	$message_id = $message_id + 1;
}
mysqli_close($con);
/*
// At to post content
// At message message
// Show only post ID
*/
//  `message_id``message_user_id``message_user_name``message_user_logo``message_id_post``message_id_comment``message_time``message_content``message_status``message_type`
?>