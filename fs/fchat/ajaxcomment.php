<?php 
require_once('classdata.php');
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);
$useractive=$_SESSION['useractive'];
$id=$_POST['id'];
$array_content['msgs']=array();
$fchat=new faceseochat();
if($id!='group'){
$id=preg_replace('/usern_/', '',$id);
$fchat->getmsg4ajax($useractive['id'],$id,$array_content['msgs']);
}else if($id=='group'){
$timeint=$_POST['timeint'];	
$fchat->getmsg10ajaxgroup($useractive['id'],'group',$array_content['msgs'],$timeint);
	}
mysqli_close($con);
echo json_encode( $array_content);
?>