<?php 
require_once('classdatarieng.php');
session_start();
$date = date_create();
$timestamp=date_timestamp_get($date);
$useractive=$_SESSION['useractive'];
$id=$_POST['id'];
$array_content['msgs']=array();
$fchat=new faceseochatrieng();
$timeint=(int)$_POST['timeint'];
if($timeint==0){
	$date = date_create();
$timeint=date_timestamp_get($date);
}
$fchat->getmsg10ajaxuser($useractive['id'],$id,$array_content['msgs'],$timeint);
mysqli_close($con);
echo json_encode( $array_content);
?>